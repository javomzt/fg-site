//JAV: Need to be able to remove certain content from the site for non-canadian-accredited investors.

function hideMenuEn() {
    //menu-item-3295 - US equity
    //menu-item-3296 - Asia Pacific equity
    //menu-item-16 - News
    document.getElementById('menu-item-3295').setAttribute("style", "display:none;");
    document.getElementById('menu-item-3296').setAttribute("style", "display:none;");
    document.getElementById('menu-item-16').setAttribute("style", "display:none;");
    }

function hideMenuFr() {
    //menu-item-249 - nouvelles
    // 3299 - US equity
    // 3300 - Asia Pacific equity
    document.getElementById('menu-item-249').setAttribute("style", "display:none;");
    document.getElementById('menu-item-3299').setAttribute("style", "display:none;");
    document.getElementById('menu-item-3300').setAttribute("style", "display:none;");
    }

function removeFundLinks() {
    jQuery('a[class="jurisdictionSensitive"]').contents().unwrap();
    }
