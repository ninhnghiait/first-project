var phoneAr = [
	{'regionCode' : 'VN', 'countryCode' : '84', 'dataInputMask' : '999 999 99 99', 'placeholder' : '0974 12 34 56'},
	{'regionCode' : 'UK', 'countryCode' : '1', 'dataInputMask' : '(999) 999-9999', 'placeholder' : '(201) 555-0123'},
];

$('.country-code').each(function() {
	var phoneElement = $(this);
      $.each( phoneAr, function( key, value ){
      	if (value.regionCode == phoneElement.text()) {
      		var phoneInput = phoneElement.parent().next();
      		phoneInput.attr('data-input-mask', value.dataInputMask);
      		phoneInput.attr('placeholder', value.placeholder);
      	}
      });
});
var countryCodeDefault = $('.country-code').text();

$('.country-code-menu li a').click(function() {
     var countryCode = $(this).parent().parent().prev();
     if ($(this).text() != countryCodeDefault) {
     countryCode.text($(this).text());
     countryCodeDefault = $(this).text();
     var phoneInput = countryCode.parent().next();
     phoneInput.val('');
     $.each( phoneAr, function( key, value ){
            if (value.regionCode == countryCode.text()) {
                phoneInput.attr('placeholder', value.placeholder);
                $(phoneInput).mask(value.dataInputMask);
                phoneInput.next().val(countryCode.text());
            }
      });
     }
});