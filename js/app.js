$(document).ready(function(){
    $('.add-to-cart-btn').click(function(){
        var product_data = $(this).attr('id').split('-');
        var product_id = product_data[0];
        var price = product_data[1];
        console.log(price);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!'
          }).then((result) => {
            if (result.isConfirmed) {                
                $.ajax({
                    data: {
                        product_id : product_id,
                        price : price
                    },
                    type: "post",
                    url: "include/add-to-cart.php",
                    success: function(data){
                        Swal.fire(
                            'Successful!',
                            'Your item has been to your cart.',
                            'success'
                        )
                    }
                });
            }
          });
    });

    $('.delete-cart').click(function (){
        var product_id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {            
                $.ajax({
                    data: {
                        product_id : product_id
                    },
                    type: "post",
                    url: "include/delete-to-cart.php",
                    success: function(data){
                        Swal.fire(
                            'Successful!',
                            'Your item has been to your cart.',
                            'success'
                        )
                        window.location.href = "shop.php";
                    }
                });
            }
          });
    });
    $('.quantity').change(function(){
        var quantity = $(this).val(); 
        var product_id =  $(this).attr('id');
        console.log(quantity, product_id);
        $.ajax({
            data: {
                quantity : quantity,
                product_id : product_id
            },
            type: "post",
            url: "include/edit-quantity.php",
            success: function(data){
            }
        });
    });
});