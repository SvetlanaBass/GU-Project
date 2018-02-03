class Container
{
    constructor(href, title, id, className){
        this.href = href;
        this.title = title;
        this.id = id;
        this.className = className;
    }
}

class Menu extends Container
{
    constructor(href, title, id, className, items){
        super(href, title, id, className);
        this.items = items;
    }

    renderMenu(){ // метод класса
        let result = '<ul class="' + this.className + '" id="' + this.id + '">';
        this.items.forEach(function (item) {
            result += '<li><a href="' + item.href + '">' + item.title + '</a>';
            if (item.items !== '') {
                result += item.renderMenu();
            }
            result += '</li>';
        });
        result += '</ul>';
        return result;
    }
}

class AjaxRequest
{
    getMenuObjects(){
        let xhr2 = new XMLHttpRequest();
        xhr2.open("GET", "json/menu.json", true);
        xhr2.send();
        xhr2.onreadystatechange = function () {
            if (this.readyState !== 4) return;
            if (this.status !== 200) {
                console.log('Error', xhr2.status, xhr2.statusText)
            } else {
                console.log('Ok!', xhr2.statusText, xhr2.responseText);
                let items2 = JSON.parse(xhr2.responseText);
                let menuItems = Transform.transformMenu(items2, items2);
                let menu = new Menu('', '', '', 'menu', menuItems);
                document.getElementById('menu').innerHTML = menu.renderMenu();
            }
        }
    }
}

class Transform
{
    static transformMenu(items, newItems){
        for (let i = 0; i < items.length; i++) {
            if (items[i] instanceof Menu){
                if (items[i] === newItems[newItems.length - 1]){
                    return newItems;
                } else {
                    continue;
                }
            } else if (items[i].items !== "") {
                let submenuLength = items[i].items.length - 1;
                if (items[i].items[submenuLength] instanceof Menu){
                    items[i] = new Menu(items[i].href, items[i].title, items[i].id,
                        items[i].className, items[i].items);
                    Transform.transformMenu(newItems, newItems);
                } else {
                    items = items[i].items;
                    Transform.transformMenu(items, newItems);
                }
            } else {
                items[i] = new Menu(items[i].href, items[i].title, items[i].id,
                    items[i].className, "");
                Transform.transformMenu(newItems, newItems);
            }
        }
    }
}

window.onload = function (){
    let ajaxRequest = new AjaxRequest;
    ajaxRequest.getMenuObjects();
};