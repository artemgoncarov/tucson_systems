import asyncio
from main import VprikolAPI

TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjY0YzU0MjU1MmZkOTdjMzMyMzY1MzhhZCIsIm1ldGhvZHMiOlsibWVtYmVycyIsImZpbmQiXSwiYW50aWZsb29kX2J5cGFzcyI6ZmFsc2UsImFkbWluX2FjY2VzcyI6ZmFsc2UsImV4cCI6MjQ0NzUxMzUwN30.ETE2v8MeuRGpKbwDhSLAEt36lPAp5UcuxQKuq4eZXXY'

client = VprikolAPI(TOKEN)

async def main():
    data = await client.get_player_information(2, "Desmont_Software")
    print(data)

asyncio.run(main())