import aiohttp
import asyncio
from pydantic import BaseModel, Field

api_token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjY0YzU0MjU1MmZkOTdjMzMyMzY1MzhhZCIsIm1ldGhvZHMiOlsibWVtYmVycyIsImZpbmQiXSwiYW50aWZsb29kX2J5cGFzcyI6ZmFsc2UsImFkbWluX2FjY2VzcyI6ZmFsc2UsImV4cCI6MjQ0NzUxMzUwN30.ETE2v8MeuRGpKbwDhSLAEt36lPAp5UcuxQKuq4eZXXY'

class Player(BaseModel):
    deposit: int
    lvl: int
    cash: int
    bank: int
    account_id: int = Field(alias='accountId')
    player_id: int | None = Field(alias='playerId')
    individual_account: int | None = Field(alias='individualAccount')
    total_money: int = Field(alias='totalMoney')
    is_online: bool = Field(alias='isOnline')
    job_label: str = Field(alias='jobLabel')
    job_id: int = Field(alias='jobId')
    rank_number: int | None = Field(alias='rankNumber')
    rank_label: str | None = Field(alias='rankLabel')
    is_leader: bool = Field(alias='isLeader')
    org_label: str = Field(alias='orgLabel')
    org_id: int | None = Field(alias='orgId')
    vip_lvl: int | None = Field(alias='vipLvl')
    vip_label: str = Field(alias='vipLabel')
    phone_number: int | None = Field(alias='phoneNumber')
    updated_at: int = Field(alias='updatedAt')


class PlayerRodina(BaseModel):
    fraction: str
    rank: int
    job: str
    hp: int
    hunger: int
    lvl: int
    vip: str
    cash: int
    bank: int
    az_coins: int = Field(alias='azCoins')
    is_leader: bool = Field(alias='isLeader')
    is_online: bool = Field(alias='isOnline')
    updated_at: int = Field(alias='updatedAt')
    is_new_request: bool = Field(alias='newRequest')


async def create_task(nickname: str, server_id: int, method: str) -> str:
    async with aiohttp.ClientSession(headers={'Authorization': 'Bearer ' + api_token}) as session:
        async with session.post('https://api.vprikol.dev/find/createTask',
                                params={'nick': nickname, 'server': server_id,
                                        'method': method}) as response:
            if response.status not in [202, 208]:
                raise Exception(f'API returned a bad status code. Detail: {(await response.json())["detail"]}.')
            request_id = (await response.json())['request_id']
            return request_id


async def get_task_result(request_id: str, server_id: int) -> Player | PlayerRodina | None:
    attempts = 0
    async with aiohttp.ClientSession(headers={'Authorization': 'Bearer ' + api_token}) as session:
        async with session.get("https://api.vprikol.dev/find/getTaskResult",
                               params={'request_id': request_id}) as response:
            status_code = response.status
            attempts += 1
        while status_code not in [200, 422]:
            if attempts >= 120:
                raise Exception('Timeout occurred, API could not respond in 2 minutes.')
            async with session.get("https://api.vprikol.dev/find/getTaskResult",
                                   params={'request_id': request_id}) as response:
                status_code = response.status
                attempts += 1
                await asyncio.sleep(1)
        if response.status == 200:
            if server_id > 200:
                return PlayerRodina(**(await response.json()))
            return Player(**(await response.json()))
        else:
            return None


async def get_player_info(nickname: str, server_id: int, method: str | None = None):
    if not method:
        method = 'free'
        # В будущем, возможно, будет платная возможность быстрее получать информацию через премиум-метод
        # Сейчас новый метод доступен только администрации бота, его можно не передавать
    request_id = await create_task(nickname, server_id, method)
    player_data = await get_task_result(request_id, server_id)
    print(player_data)
    # Можно срезать точкой, например, player_data.lvl


asyncio.run(get_player_info('Miguel_Evans', 18))