$(document).ready(function(){
    $("#products").on('click', '.add-to-cart', function(){
        console.log("dfFDFDFDF");
        $.ajax({
            'url' : 'function.php',
            'method' : 'POST',
            'data' : {'id1':$(this).data('pid')},
            'datatype' : 'JSON'
        }).done(function(data){
            a = $.parseJSON(data);
            displayCart(a);
            
        })
    })
})
$(document).ready(function() {
    $('#cart').on('click','.Update',function(){
        $.ajax({
            'url' : 'function.php',
            'method' : 'POST',
            'data' : {'index' : $(this).data('pos'),'inp-field':$(this).closest('tr').find('.varqua').val()},
            'datatype' : 'JSON' 
        }).done(function(data){
            a=$.parseJSON(data);
            displayCart(a);
        })
    })
})
$(document).ready(function() {
    $('#cart').on('click','.Delete',function(){
        $.ajax({
            'url' : 'function.php',
            'method' : 'POST',
            'data' : {'index1' : $(this).data('index')},
            'datatype' : 'JSON' 
        }).done(function(data){
            a=$.parseJSON(data);
            displayCart(a);
        })
    })
})
$(document).ready(function() {
    $('#cart').on('click','.empty',function(){
        $.ajax({
            'url' : 'function.php',
            'method' : 'POST',
            'data' : {'empty' : $(this).data('o')},
            'datatype' : 'JSON' 
        }).done(function(data){
            a=$.parseJSON(data);
            displayCart(a);
        })
    })
})

function displayCart(cartArr) {
    var text="<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Update</th><th>Delete</th></tr>";
    let grand=0;
    for(i=0; i<cartArr.length; i++) {
        itemprice = cartArr[i].quantity * cartArr[i].price;
        grand += itemprice;
        text += '<tr><td>'+cartArr[i].id+'</td><td>'+cartArr[i].image+'</td><td>$ '+itemprice+'</td><td><input type="text" class="varqua" value="'+ cartArr[i].quantity +'"></td><td><button class="Update" data-pos='+i+'>Update</button></td><td><button class="Delete" data-index='+i+'>Delete</button></td></tr>';
    }
    text += '<tr><td></td><td><b>Total</b></td><td>$ '+grand+'</td><td></td></tr></table>';
    text += '<button class="empty" data-o="p">Empty Cart</button>';

    $('#cart').html(text);
}