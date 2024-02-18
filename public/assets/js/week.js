export const week = {

    navMenus: null,
    navCourses: null,
    contenuMenus: null,
    contenuCourses: null,
    ingredients: null,

    init: function () {
        week.initElements();
        week.bind();
    },

    initElements: function () {
        week.navMenus = document.querySelectorAll('.week-nav > h2')[0];
        week.navCourses = document.querySelectorAll('.week-nav > h2')[1];
        week.contenuMenus = document.querySelector('.menus');
        week.contenuCourses = document.querySelector('.courses');
        week.ingredients = document.querySelectorAll('.ingredient');
    },

    bind: function () {
        week.navMenus.addEventListener('click', week.handleNavMenus);
        week.navCourses.addEventListener('click', week.handleNavCourses);
        for (const ingredient of week.ingredients) {
            ingredient.addEventListener('click', week.handleCheckIngredient);
        }
        
    },

    handleNavMenus: function () {
        week.navMenus.classList.add('active');
        week.contenuMenus.classList.remove('hidden');
        week.navCourses.classList.remove('active');
        week.contenuCourses.classList.add('hidden');
    },

    handleNavCourses: function () {
        week.navMenus.classList.remove('active');
        week.contenuMenus.classList.add('hidden');
        week.navCourses.classList.add('active');
        week.contenuCourses.classList.remove('hidden');
    },

    handleCheckIngredient: function (event) {
        event.currentTarget.classList.toggle('en-stock');
    }

}