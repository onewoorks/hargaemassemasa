if (typeof EventSource !== 'undefined') {
    var source = new EventSource(
        `/wp-content/plugins/livegoldprice/web/assets/js/event.php`, 
        )
    source.onmessage = function (event) {
        let price_data = JSON.parse(event.data)
        parser(price_data)
    }
} else {
    document.getElementById('last_update').innerHTML =
        'Sorry, your browser does not support server-sent events...'
}

function parser(data) {
    document.getElementById('papar-harga').style.display = 'block';
    document.getElementById('gold-ounce').innerHTML = '£ '+data.gold
    document.getElementById('gold-gram').innerHTML = '£ '+ data.gold_gram
    document.getElementById('gold-kg').innerHTML = '£ '+ data.gold_kg
    document.getElementById('silver-ounce').innerHTML = '£ '+data.silver
    document.getElementById('silver-gram').innerHTML = '£ '+data.silver_gram
    document.getElementById('silver-kg').innerHTML = '£ '+data.silver_kg
    document.getElementById('platinum-ounce').innerHTML = '£ '+data.platinum
    document.getElementById('platinum-gram').innerHTML = '£ '+data.platinum_gram
    document.getElementById('platinum-kg').innerHTML = '£ '+data.platinum_kg
    document.getElementById('last_update').innerHTML = data.last_update
    document.getElementById('top-gold-ounce').innerHTML = '£ '+data.gold
    document.getElementById('top-silver-ounce').innerHTML = '£ '+data.silver
    document.getElementById('top-platinum-ounce').innerHTML = '£ '+data.platinum

    var element =  document.getElementById('first-load');
    if (typeof(element) != 'undefined' && element != null){
      document.getElementById('first-load').remove()
    }
}

function showTimestamp() {
    let date = new Date()
    let timestamp = date.toLocaleString()
    document.getElementById('timestamp').innerHTML = timestamp
}

window.onload = showTimestamp()

setInterval(showTimestamp, 1000)
if (typeof EventSource !== 'undefined') {
    var source = new EventSource(
        `/wp-content/plugins/livegoldprice/web/assets/js/event.php`, 
        )
    source.onmessage = function (event) {
        let price_data = JSON.parse(event.data)
        parser(price_data)
    }
} else {
    document.getElementById('last_update').innerHTML =
        'Sorry, your browser does not support server-sent events...'
}

function parser(data) {
    document.getElementById('papar-harga').style.display = 'block';
    document.getElementById('gold-ounce').innerHTML = '£ '+data.gold
    document.getElementById('gold-gram').innerHTML = '£ '+ data.gold_gram
    document.getElementById('gold-kg').innerHTML = '£ '+ data.gold_kg
    document.getElementById('silver-ounce').innerHTML = '£ '+data.silver
    document.getElementById('silver-gram').innerHTML = '£ '+data.silver_gram
    document.getElementById('silver-kg').innerHTML = '£ '+data.silver_kg
    document.getElementById('platinum-ounce').innerHTML = '£ '+data.platinum
    document.getElementById('platinum-gram').innerHTML = '£ '+data.platinum_gram
    document.getElementById('platinum-kg').innerHTML = '£ '+data.platinum_kg
    document.getElementById('last_update').innerHTML = data.last_update

    var element =  document.getElementById('first-load');
    if (typeof(element) != 'undefined' && element != null){
      document.getElementById('first-load').remove()
    }
}

function showTimestamp() {
    let date = new Date()
    let timestamp = date.toLocaleString()
    document.getElementById('timestamp').innerHTML = timestamp
}

window.onload = showTimestamp()

setInterval(showTimestamp, 1000)
