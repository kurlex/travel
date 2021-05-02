function up(max,e) {
    document.getElementById(e).value = parseInt(document.getElementById(e).value) + 1;
    if (document.getElementById(e).value >= parseInt(max)) {
        document.getElementById(e).value = max;
    }
}

function down(min,e) {
    document.getElementById(e).value = parseInt(document.getElementById(e).value) - 1;
    if (document.getElementById(e).value <= parseInt(min)) {
        document.getElementById(e).value = min;
    }
}