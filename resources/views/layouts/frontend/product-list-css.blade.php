<script>
function priceOnchange(min, max) {
    var show = document.getElementById("price-show");
    if(min>10000000) {
        min /= 10000000;
        min = Math.round(min);
        min += ' Crore';
    } else if(min>100000) {
        min /= 100000;
        min = Math.round(min);
        min += ' Lakh';
    } else {
        min /= 1000;
        min = Math.round(min);
        min += ' K';
    }
    if(max>10000000) {
        max /= 10000000;
        max = Math.round(max);
        max += ' Crore';
    } else if(max>100000) {
        max /= 100000;
        max = Math.round(max);
        max += ' Lakh';
    } else {
        max /= 1000;
        max = Math.round(max);
        max += ' K';
    }
    show.innerHTML = "BDT "+min+" - BDT "+max;
}
function priceUpdate() {
    var minimum = document.getElementById("minimum-price").value;
    var maximum = document.getElementById("maximum-price").value;
    products.updatePrice(minimum, maximum);
    products.searchSubmit();
}
function makeYearOnchange(min, max) {
    var show = document.getElementById("make-year-show");
    show.innerHTML = min+" - "+max;
}
function makeYearUpdate() {
    var minimum = document.getElementById("minimum-make-year").value;
    var maximum = document.getElementById("maximum-make-year").value;
    products.updateMakeYear(minimum, maximum);
    products.searchSubmit();
}
function kmsDrivenOnchange(min, max) {
    var show = document.getElementById("kms-driven-show");
    show.innerHTML = integerWithCommasIndian(min)+" Kms - "+integerWithCommasIndian(max)+" Kms";
}
function kmsDrivenUpdate() {
    var minimum = document.getElementById("minimum-kms-driven").value;
    var maximum = document.getElementById("maximum-kms-driven").value;
    products.updateKmsDriven(minimum, maximum);
    products.searchSubmit();
}
</script>