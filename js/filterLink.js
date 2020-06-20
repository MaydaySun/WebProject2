function changeSelect() {
    const filterByCountry = document.getElementById("filterByCountry");
    let filterByCity = document.getElementById("filterByCity");
    for (let i=0;i < filterByCity.options.length;i++){
        filterByCity.options[i].hidden = true;
    }
    let cities = document.getElementsByName(filterByCountry.value);
    for (let j=0;j<cities.length;j++){
        cities[j].hidden = false;
    }
    // let add,addValue;
    // if (filterByCountry.value == "China") {
    //     add = new Array("上海","昆明","北京","烟台");
    //     addValue = new Array("Shanghai","Kunming","Beijing","Yantai");
    // } else if (filterByCountry.value == "Italy") {
    //     add = new Array("罗马","维罗纳","威尼斯","佛罗伦萨");
    //     addValue = new Array("Roma","Verona","Venice","Firenze");
    // } else if (filterByCountry.value == "Japan") {
    //     add = new Array("东京","大阪","镰仓");
    //     addValue = new Array("Tokyo","Osaka","Kamakura");
    // } else if (filterByCountry.value == "Canada") {
    //     add = new Array("卡尔加里","卢嫩堡");
    //     addValue = new Array("Calgary","Lunenburg");
    // } else if (filterByCountry.value == "United States") {
    //     add = new Array("纽约","奥兰多","华盛顿");
    //     addValue = new Array("New York City","Orlando","Washington");
    // }
    // filterByCity.length = 0;
    // const newOption = new Option();
    // newOption.text="选择城市";
    // newOption.value="";
    // newOption.selected=true;
    // newOption.disabled = true;
    // newOption.hidden = true;
    // filterByCity.add(newOption);
    // for (let i = 0; i < addValue.length; i++) {
    //     const newOption = new Option();
    //     newOption.text = add[i];
    //     newOption.value = addValue[i];
    //     filterByCity.add(newOption);
    // }
}

