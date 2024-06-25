$(document).ready(function() {
    
    $('#logout').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);
        
        formData.append('action', 'logout');

        let confirmation = confirm("Are you sure you want to logout?");
        
        if(confirmation){
            $.ajax({
                url: '../config/validations.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {

                    $('#logout')[0].reset();

                    if(response.success){
                            location.reload();
                    }
                }
            });
        }
    });

    $('#login_form').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);

        formData.append('action', 'login');

        $.ajax({
            url: '../config/validations.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // $('#result').html( response.message);
                
                if(response.success){
                    if(response.admin){
                        // setTimeout(function() {
                            window.location.href = "./index.php";
                        // }, 20);
                    }else{
                        // setTimeout(function() {
                            window.location.href = "../index.php";
                        // }, 20);
                    }
                    
                    $('#result').html(response.message);
                    $('#login_form')[0].reset();
                }else{
                    $('#result').html(response.message);
                }
            },
            error: function(xhr, status, error) {
                $('#result').html("An error occurred: " + xhr.responseText);
            }
        });
    });

    $('#reg_form').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);

        formData.append('action', 'registration');

        $.ajax({
            url: '../config/validations.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#result').html( response);
                $('#reg_form')[0].reset();

                // setTimeout(function() {
                //     location.reload();
                // }, 2000);
            },
            error: function(xhr, status, error) {
                $('#result').html("An error occurred: " + xhr.responseText);
            }
        });
    });

    $('#add-cat').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);

        $.ajax({
            url: '../config/validations.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#result').html( response);
                $('#add-cat')[0].reset();
                
                setInterval(function(){
                    location.reload();
                }, 20)
            },
            error: function(xhr, status, error) {
                $('#result').html("An error occurred: " + xhr.responseText);
            }
        });
    });

    $('#add-product').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);

        $.ajax({
            url: '../config/validations.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#result').html( response);
                $('#add-product')[0].reset();

                setTimeout(function() {
                    location.reload();
                }, 2000);
            },
            error: function(xhr, status, error) {
                $('#result').html("An error occurred: " + xhr.responseText);
            }
        });
    });

    $('#delete-cat').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);

        $.ajax({
            url: '../config/validations.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#result').html( response);
                $('#delete-cat')[0].reset();
                
                setTimeout(function(){
                    location.reload();
                }, 20)
            },
            error: function(xhr, status, error) {
                $('#result').html("An error occurred: " + xhr.responseText);
            }
        });
    });

    $('#upd-product').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);

        $.ajax({
            url: '../config/validations.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#result').html( response);
                $('#upd-product')[0].reset();

                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(xhr, status, error) {
                $('#result').html("An error occurred: " + xhr.responseText);
            }
        });
    });
});

