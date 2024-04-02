import {week} from "./week.js";
import {home} from "./home.js";

const app = {

    init: function () {
        app.classHome = document.querySelector('.last-recipes');
        app.classWeek = document.querySelector('.courses');
                
        if(app.classHome) {home.init();};
        if(app.classWeek) {week.init();}
    }

}

document.addEventListener("DOMContentLoaded", app.init);