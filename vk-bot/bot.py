from vkbottle.bot import Bot, Message
import requests
import json
import asyncio
from main import VprikolAPI

TOKEN = ''

client = VprikolAPI(TOKEN)
token = ""

bot = Bot(token=token)

ranks = {
    0: 'Игрок',
    1: 'Заместитель фракции',
    2: 'Лидер фракции',
    3: 'Следящий за фракцией',
    4: 'Заместитель ГС за фракцией',
    5: 'Гл. следящий за фракцией',
    6: 'Куратор',
    7: 'Зам. Гл. Администратора',
    8: 'Главный Администратор',
    9: 'Разработчик'
}

fractions = {
    31: 'отсутствует',
    0: 'Полиция ЛС',
    1: 'Полиция СФ',
    2: 'Тюрьма строго режима LV',
    3: 'TV студия',
    4: 'East Side Ballas',
    5: 'Russian Mafia',
    6: 'Warlock MC',
    7: 'Больница LV',
    8: 'Night Wolves',
    9: 'Хитманы',
    10: 'Больница Jefferson',
    11: 'RCSD',
    12: 'Больница LS',
    13: 'Больница СФ',
    14: 'Grove Street',
    15: 'Varrios Los Aztecas',
    16: 'Yakuza',
    17: 'Армия ЛС',
    18: 'LVPD',
    19: 'TV студия SF',
    20: 'Страховая компания',
    21: 'FBI',
    22: 'Правительство LS',
    23: 'Центр лицензирования',
    24: 'Los Santos Vagos',
    25: 'The Rifa',
    26: 'La Cosa Nostra',
    27: 'Центральный Банк',
    28: 'TV студия LV',
    29: 'Армия SF',
    30: 'Tierra Robada Bikers',
}

@bot.on.message(text="/info")
async def info(message: Message):
    users_info = await bot.api.users.get(message.from_id)
    await message.answer(
        f"Привет, [id{users_info[0].id}|{users_info[0].first_name} {users_info[0].last_name}]! \n"
        f"✨ Информация о боте: \n"
        f"✨ Создатели: Fullstack - [id534563953|Артём Гончаров], Web design - [id704689343|Ville Lindberg]\n"
        f"✨ Часть проекта Tucson Systems"
    )

@bot.on.message(text="/kick <id>")
async def kick(message: Message, id=None):
    users_info = await bot.api.users.get(message.from_id)
    user_id = users_info[0].id
    full_name = users_info[0].first_name + ' ' + users_info[0].last_name
    uid = id.split("|")
    uid = uid[0].split("[")
    uid = uid[1].split("id")
    uid = int(uid[1])
    request1 = requests.get(f'https://artemgoncarov.online/api/admin/getLvl.php?vk_id={user_id}')
    request2 = requests.get(f'https://artemgoncarov.online/api/admin/getInfo.php?vk_id={uid}')
    requests.get(f'https://artemgoncarov.online/api/admin/deleteFromDB.php?vk_id={uid}')

    author_lvl = int(json.loads(request1.text)['lvl'])
    user_lvl = int(json.loads(request2.text)['lvl'])
    full_name1 = json.loads(request2.text)['name'] + ' ' + json.loads(request2.text)['surname']

    if author_lvl >= 3 and user_lvl < author_lvl:
        await message.answer(f'✨ Пользователь [id{uid}|{full_name1}] успешно исключен администратором [id{user_id}|{full_name}]!')
    else:
        await message.answer('❗ Ошибка! Недостаточно прав!')

@bot.on.message(text='/getinfo <id>')
async def getinfo(message: Message, id=None):
    users_info = await bot.api.users.get(message.from_id)
    user_id = users_info[0].id
    uid = id.split("|")
    uid = uid[0].split("[")
    uid = uid[1].split("id")
    uid = int(uid[1])
    try:
        request1 = requests.get(f'https://artemgoncarov.online/api/admin/getInfo.php?vk_id={uid}')
        request2 = requests.get(f'https://artemgoncarov.online/api/admin/getInfo.php?vk_id={user_id}')

        author_lvl = int(json.loads(request2.text)["lvl"])
        full_name1 = json.loads(request1.text)["name"] + ' ' + json.loads(request1.text)["surname"]
        # await message.answer(f'{author_lvl} and {full_name1}')
        if author_lvl >= 3:
            await message.answer(
                f'✨ Информация о пользователе [id{uid}|{full_name1}]:\n'
                f'Должность: {ranks[int(json.loads(request1.text)["lvl"])]}\n'
                f'Фракция: {fractions[int(json.loads(request1.text)["fraction"])]}\n'
                f'Дата назначения: {json.loads(request1.text)["date"]}\n'
            )
        else:
            await message.answer('❗ Ошибка! Недостаточно прав!')
    except Exception:
        await message.answer('❗ Ошибка! Пользователь не зарегистрирован!')

@bot.on.message(text='/myinfo')
async def myinfo(message: Message):
    users_info = await bot.api.users.get(message.from_id)
    user_id = users_info[0].id
    try:
        request1 = requests.get(f'https://artemgoncarov.online/api/admin/getInfo.php?vk_id={user_id}')
        full_name = json.loads(request1.text)["name"] + ' ' + json.loads(request1.text)["surname"]

        await message.answer(
            f'✨ Информация о пользователе [id{user_id}|{full_name}]:\n'
            f'Должность: {ranks[int(json.loads(request1.text)["lvl"])]}\n'
            f'Фракция: {fractions[int(json.loads(request1.text)["fraction"])]}\n'
            f'Дата назначения: {json.loads(request1.text)["date"]}\n'
        )
    except Exception:
        await message.answer('❗ Ошибка! Вы не зарегистрированы!')

@bot.on.message(text="/find <nick> <server>")
async def find(message: Message, nick = None, server = None):
    data = await client.get_player_information(server, nick)
    await message.answer(
        f'👤 Информация об игроке {data["playerNick"]} на сервере {data["serverName"]} [{data["playerServer"]}]:\n'
        f'⚙ ID аккаунта: {data["accountId"]}\n'
        f'💾 Уровень: {data["lvl"]}\n'
        f'👑 Уровень VIP: {data["vipLabel"]}\n'
        f'📱 Номер телефона: {data["phoneNumber"]}\n'
        f'{"⛔" if data["isOnline"] == True else "⛔"} Состояние: {"Онлайн" if data["isOnline"] == True else "Не в сети"}\n'
        f'\n'
        f'💰 Всего денег: {data["totalMoney"]}$\n'
        f'💵 Наличные: {data["cash"]}$\n'
        f'🏛 Деньги в банке: {data["bank"]}$\n'
        f'💳 Депозит: {data["deposit"]}$\n'
        f'💸 Личный счет: Нет \n'
        f'\n'
        f'🏢 Работа: {data["jobLabel"]}\n'
        f'💼 Организация: {data["orgLabel"]}\n'
        f'👥 Должность: {"Нет" if data["rankNumber"] == 0 else data["rankNumber"]}'
    )

bot.run_forever()
