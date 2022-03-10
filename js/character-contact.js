function limiteur()
{
    maximum = 1500;
    champ = document.formulaire.message;
    indic = document.formulaire.number;

    if (champ.value.length > maximum)
        champ.value = champ.value.substring(0, maximum);
    else
    indic.value = 0 + champ.value.length;
}