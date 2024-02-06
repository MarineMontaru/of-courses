export const home = {

    sliderGauche: null,
    sliderDroite: null,
    recettes: null,
    recetteCourante: 0,
    nouvelleRecette: null,

    /* TODO remplacer le tableau dernieresRecettes par une base de donnees à part où on stocke les dernieres recettes ajoutées (ou piocher directement dans la base globale de recettes ?) */
    dernieresRecettes: [
        'Risotto au brocoli',
        'Galette des rois à la frangipane',
        'Lasagnes',
        'Burger de canard'
    ],

    init: function () {
        home.initElements();
        home.bind();
    },

    initElements: function () {
        home.sliderGauche = document.querySelectorAll('.dernieres-recettes__nav')[0];
        home.sliderDroite = document.querySelectorAll('.dernieres-recettes__nav')[1];
        home.recettes = document.querySelectorAll('.dernieres-recettes__recette');
        home.recettes[home.recetteCourante].classList.add('recette-slider');
    },

    bind: function () {
        home.sliderGauche.addEventListener('click', home.handleSliderPrecedent);
        home.sliderDroite.addEventListener('click', home.handleSliderSuivant);
    },

    handleSliderSuivant: function () {
        home.nouvelleRecette = home.recetteCourante >= home.dernieresRecettes.length - 1
            ? 0
            : home.recetteCourante + 1;

        home.afficherRecette(home.nouvelleRecette);     
    },

    handleSliderPrecedent: function () {
        home.nouvelleRecette = home.recetteCourante === 0
            ? home.dernieresRecettes.length - 1
            : home.recetteCourante - 1;

        home.afficherRecette(home.nouvelleRecette);     
    },

    afficherRecette: function(nouvelleRecette) {
        for (const recette of home.recettes) {
            recette.classList.remove('recette-slider');
        }

        home.recettes[nouvelleRecette].classList.add('recette-slider');

        home.recetteCourante = nouvelleRecette;
    },


}