import {week} from "./week.js";
import {home} from "./home.js";

const app = {

    initElements: function () {
        app.classHome = document.querySelector('.dernieres-recettes');
        app.classWeek = document.querySelector('.courses');
        app.init();
    },

    init: function () {
        
        if(app.classHome) {
            home.init();
        };

        if(app.classWeek) {
            week.init();
        }
    }

}

document.addEventListener("DOMContentLoaded", app.initElements);