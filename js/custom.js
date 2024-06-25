(function() {
	'use strict';

	var tinyslider = function() {
		var el = document.querySelectorAll('.testimonial-slider');

		if (el.length > 0) {
			var slider = tns({
				container: '.testimonial-slider',
				items: 1,
				axis: "horizontal",
				controlsContainer: "#testimonial-nav",
				swipeAngle: false,
				speed: 700,
				nav: true,
				controls: true,
				autoplay: true,
				autoplayHoverPause: true,
				autoplayTimeout: 3500,
				autoplayButtonOutput: false
			});
		}
	};
	tinyslider();

	var categories = function(){
		var el = document.querySelectorAll('.categories-slider');

		if (el.length > 0) {
			var slider = tns({
				container: '.categories-slider',
				items: 1,
				axis: "horizontal",
				controlsContainer: "#categories-nav",
				swipeAngle: false,
				speed: 700,
				nav: true,
				controls: true,
				autoplay: true,
				autoplayHoverPause: true,
				autoplayTimeout: 3500,
				autoplayButtonOutput: false
			});
		}
	}
	categories();
})();

var cartCalc = function(){

	var initPrice = document.querySelectorAll(".price"),
		totalPrice = document.querySelectorAll(".total"),
		increaseBtn = document.querySelectorAll(".increase"),
		decreaseBtn = document.querySelectorAll(".decrease"),
		quantityContainer = document.querySelectorAll(".quantity-amount");

	function initValue(){
		for (let index = 0; index < initPrice.length; index++) {
			totalPrice[index].innerHTML = parseFloat(initPrice[index].innerText * quantityContainer[index].value).toFixed(2);
			
		}
	}

	function increaseValue(){
		for(let i = 0; i < increaseBtn.length; i++){
			increaseBtn[i].addEventListener("click", () => {
				let quantity = parseInt(quantityContainer[i].value) + 1
				quantityContainer[i].value = quantity;
				totalPrice[i].innerHTML = (parseFloat(initPrice[i].innerText) * quantity).toFixed(2);
				let cartId = increaseBtn[i].getAttribute("data-cart-id");

				updateQunatity(cartId, quantity)
				cartTotal();
			});
		}
	}

	function decreaseValue(){
		for(let i = 0; i < decreaseBtn.length; i++){
			decreaseBtn[i].addEventListener("click", () => {
				let quantity = parseInt(quantityContainer[i].value) !== 0 ? parseInt(quantityContainer[i].value) - 1: 0;
				quantityContainer[i].value = quantity;
				totalPrice[i].innerHTML = (parseFloat(initPrice[i].innerText) * quantity).toFixed(2);
				let cartId = increaseBtn[i].getAttribute("data-cart-id");

				updateQunatity(cartId, quantity);
				cartTotal();
			});
		}
	}

	function cartTotal(){
		let totalAmount = 0;
		totalPrice.forEach((item) => {
			totalAmount += parseFloat(item.innerText);
		})
		document.getElementById("cartTotal").innerText = totalAmount.toFixed(2);
	}

	initValue();
	increaseValue();
	decreaseValue();
	cartTotal();
}

let updateQunatity = function (id, value){
	$.ajax({
		url: './config/validations.php',
		type: 'POST',
		data: {
			action: "updateCart",
			cr_id: id,
			cr_value: value
		},

		success: function(response) {
			console.log(response)
		},
		error: function(xhr, status, error) {
			console.log("An error occurred: " + xhr.responseText || status.responseText || error);
		}
	});
}

let totalAmount = function(){
	let productTotal = document.querySelectorAll(".checkoutAmount"),
		displayAmount = document.getElementById("cartTotal");

	let price = 0;

	productTotal.forEach((item) => {
		price += parseInt(item.innerText);
	});

	displayAmount.innerText = "$" + price;

}

let logout = function(){
	let confirmation = confirm("Are you sure you want to logout?");
        
        if(confirmation){
            $.ajax({
                url:  './config/validations.php',
                type: 'POST',
                data: {
					action: "logout",
					logout: true
				},
                success: function(response) {
					setTimeout(function() {
						location.reload();
					}, 1000);
                }
            });
		}
}

let removeCart = function(event,id){
	event.preventDefault();
	$.ajax({
		url: './config/validations.php',
		type: 'POST',
		data: {
			action: "removeCart",
			cr_id: id
		},
		dataType: 'json',
		success: function(response) {
			
			if(response.success){
				$(event.target).closest('tr').fadeOut();
				
				setTimeout(function() {
					$("#cart-notification").html(response.message).animate({
						"left": "0px"
					}, function() {
						setTimeout(function() {
							$("#cart-notification").animate({
								"left": "-100%"
							}, 500);
						}, 2000);
					});
				}, 20);
				
				
			}else{
				setTimeout(function() {
					$("#cart-notification").html(response.message).animate({
						"left": "0px"
					}, 500, function() {
						setTimeout(function() {
							$("#cart-notification").animate({
								"left": "-100%"
							}, 500);
						}, 2000);
					});
				}, 2000);
			}
		},
		error: function(xhr, status, error) {
			$('#result').html("An error occurred: " + xhr.responseText);
		}
	});
}

let searchScreen = document.getElementById("search-box");
let searchInput = document.getElementById("search");
let openSearch = function(){
	searchScreen.style.top = "0px";
}
let closeSearch = function(){
	searchScreen.style.top = "-100%"
}

searchInput.addEventListener("focus", () => {
	$("#search-result").fadeIn();
});
searchInput.addEventListener("blur", () => {
	$("#search-result").fadeOut();
});

searchInput.addEventListener("keyup", () => {
	$.ajax({
		url:  './config/validations.php',
		type: 'POST',
		data: {
			action: "search",
			s_box: $("#search").val()
		},
		success: function(response) {
			$("#search-result").html(response);
		}
	});
});

function addCart(id){
	$.ajax({
		url: './config/validations.php',
		type: 'POST',
		data: {
			action: 'addCart',
			add_cart: id
		},	
		dataType: 'json',
		success: function(response) {
			// $('#result').html( response.message);
			
			if(response.success){
				
				setTimeout(function() {
					$("#cart-notification").html(response.message).animate({
						"left": "0px"
					}, function() {
						setTimeout(function() {
							$("#cart-notification").animate({
								"left": "-100%"
							}, 500);
						}, 5000);
					});
				}, 20);
				
			}else{
				setTimeout(function() {
					$("#cart-notification").html(response.message).animate({
						"left": "0px"
					}, 500, function() {
						setTimeout(function() {
							$("#cart-notification").animate({
								"left": "-100%"
							}, 500);
						}, 5000);
					});
				}, 20);
			}
		},
		error: function(xhr, status, error) {
			$('#result').html("An error occurred: " + xhr.responseText);
		}
	});
}
function buyNow(id){
	
	$.ajax({
		url: './config/validations.php',
		type: 'POST',
		data: {
			action: 'buyNow',
			buy_now: id
		},
		dataType: 'json',
		success: function(response) {
			// $('#result').html( response.message);
			
			if(response.success){
				
				setTimeout(function() {
					$("#cart-notification").html(response.message).animate({
						"left": "0px"
					}, function() {
						setTimeout(function() {
							$("#cart-notification").animate({
								"left": "-100%"
							}, 500);
						}, 5000);
					});
				}, 20);

				window.location.href = "./checkout.php";
				
			}else{
				setTimeout(function() {
					$("#cart-notification").html(response.message).animate({
						"left": "0px"
					}, 500, function() {
						setTimeout(function() {
							$("#cart-notification").animate({
								"left": "-100%"
							}, 500);
						}, 5000);
					});
				}, 20);
			}
			console.log("working");
		},
		error: function(xhr, status, error) {
			$('#result').html("An error occurred: " + xhr.responseText);
		}
	});
}
function order(event){
	event.preventDefault(); 
        
	var formData = new FormData(this);
	
	formData.append('action', 'order');
	
		$.ajax({
			url: './config/validations.php',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(response) {

				console.log(response);

				try{
					if(response.success){
						window.location.href = "./thankyou.php?inv-num=" + response.message;
					}else{
						console.log("Error: " + response.message);
					}

				}catch(e){
					console.error("Parsing Error: ", e);
				}
					
			}
		});

}


document.getElementById("checkoutForm").addEventListener("submit", order);