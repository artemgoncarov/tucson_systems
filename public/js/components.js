const fractions = {
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

class zamsComponent extends Component {
    #rootElement
    #nickElement
    #vkLinkElement
    #fractionElement
    #warnsElement
    #dateElement
    constructor() {
        super();
        this.#rootElement = this.createElementByTemplate('#zams-template');
        this.#nickElement = this.#rootElement.querySelector('.nick');
        this.#vkLinkElement = this.#rootElement.querySelector('.vk-link');
        this.#fractionElement = this.#rootElement.querySelector('.fraction');
        this.#warnsElement = this.#rootElement.querySelector('.warns');
        this.#dateElement = this.#rootElement.querySelector('.date');
        Api.post("https://artemgoncarov.online/api/admin/zams/getZams.php").then((data) => {
            this.#nickElement.innerText = data.nick;
            this.#vkLinkElement.innerText = 'https://vk.com/id' + data.vk_id;
            this.#fractionElement.innerText = fractions[data.fraction];
            this.#warnsElement.innerText = data.warns;
            this.#dateElement.innerText = data.date;
        })
    }
}