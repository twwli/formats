<div id="filter-menu">
    <div class="filter-block">
        <div class="filter-list">
            <button data-filter="lamousseeditions">La mousse éditions</button>
            <button data-filter="ecal">Écal</button>
            <button data-filter="hckr">HCKR</button>
            <button data-filter="slanted">Slanted</button>
            <button data-filter="editions205">Éditions 205</button>
            <button data-filter="risosurmer">Riso sur mer</button>
            <button data-filter="editiondelalizarine">Éditions de l’Alizarine</button>
            <button data-filter="editionb42">Edition B42</button>
        </div>

        <div class="filter-trigger">
            <span>
                <svg fill="none" height="12" viewBox="0 0 12 12" width="12" xmlns="http://www.w3.org/2000/svg"><path d="m6.58363 2.87132v9.12868h-1.5v-9.12868l-4.02297 4.02298-1.06066-1.06065 5.83363-5.83365 5.83367 5.83365-1.0607 1.06065z" fill="#000"/></svg>
            </span>
            <h3>Éditions</h3>
        </div>
    </div>

    <div class="filter-block">
        <div class="filter-list">
            <button data-filter="shadok">Shadok</button>
            <button data-filter="hear">HEAR</button>
            <button data-filter="garagecoop">Garage COOP</button>
            <button data-filter="palaisuniversitaire">Palais universitaire</button>
            <button data-filter="cric">CRIC</button>
            <button data-filter="bnu">BNU</button>
            <button data-filter="lamenuiserie">La Menuiserie</button>
        </div>

        <div class="filter-trigger">
            <span>
            <svg fill="none" height="12" viewBox="0 0 12 12" width="12" xmlns="http://www.w3.org/2000/svg"><path d="m6.58363 2.87132v9.12868h-1.5v-9.12868l-4.02297 4.02298-1.06066-1.06065 5.83363-5.83365 5.83367 5.83365-1.0607 1.06065z" fill="#000"/></svg>
            </span>
            <h3>Lieux</h3>
        </div>
    </div>

    <div class="filter-block">
        <div class="filter-list">
            <button data-filter="conferences">Conférences</button>
            <button data-filter="expositions">Expositions</button>
            <button data-filter="salongraphique">Salon graphique</button>
            <button data-filter="ateliers">Ateliers</button>
        </div>

        <div class="filter-trigger">
            <span>
            <svg fill="none" height="12" viewBox="0 0 12 12" width="12" xmlns="http://www.w3.org/2000/svg"><path d="m6.58363 2.87132v9.12868h-1.5v-9.12868l-4.02297 4.02298-1.06066-1.06065 5.83363-5.83365 5.83367 5.83365-1.0607 1.06065z" fill="#000"/></svg>
            </span>
            <h3>Événements</h3>
        </div>
    </div>

    <div class="filter-all">
        <button data-filter="all">Tous <svg fill="none" height="12" viewBox="0 0 13 12" width="13" xmlns="http://www.w3.org/2000/svg"><path d="m9.96233 6.74989h-9.128682v-1.5h9.128682l-4.02298-4.02297 1.06065-1.06066 5.8336 5.83363-5.8336 5.83361-1.06065-1.0606z" fill="#000"/></svg></button>
    </div>
</div>

<style>
    #filter-menu {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 888;
        font-size: 15px;
        background-color: #fff;
        border-top: .5px solid rgba(0,0,0,.9);
        display: flex;
        justify-content: space-around;
    }

    .filter-block {
        display: flex;
        flex-direction: column;
        position: relative;
        text-align: left;
    }

    .filter-trigger {
        display: flex;
        align-items: center;
        padding: 8px 0 16px;
        cursor: pointer;
    }

    .filter-trigger span {
        margin-right: 8px;
    }

    .filter-list {
        position: absolute;
        display: flex;
        flex-direction: column;
        top: -8px;
        transform: translateY(-100%);
        width: 254px;
        padding: 4px 16px;
        line-height: 1.75em;
        background-color: #fff;
    }

    .filter-list button,
    .filter-all button {
        background-color: transparent;
        text-align: left;
        cursor: pointer;
    }

    .filter-all button {
        display: flex;
        align-items: center;
        padding: 8px 0 16px;
    }
</style>