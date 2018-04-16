function processImage() {
	var gambarnya = document.getElementById('url_gambar').value;
	console.log(gambarnya);
      if($('#url_gambar').val() == ''){
        swal('Maaf', 'Url harus di isi', 'error');
      }else{

        var subscriptionKey = "fdf60418456d424a9b1873b0a284919b";
        var uriBase = "https://westcentralus.api.cognitive.microsoft.com/vision/v1.0/analyze";
        var params = {
            "visualFeatures": "Categories,Description,Color",
            "details": "",
            "language": "en",
        };
		
        $.ajax({
            url: uriBase + "?" + $.param(params),
            beforeSend: function(xhrObj){
                xhrObj.setRequestHeader("Content-Type","application/json");
                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);
            },
            type: "POST",
            data: '{"url": ' + '"' + gambarnya + '"}',
        })

        .done(function(data) {
			var hasil;
			var hasil2 = null;
			data.description.tags.forEach(e => {
				if(e === 'lion'){
					hasil2 = "Itu Gambar Singa";
				}else{
					hasil = "Itu Bukan Gambar Singa";
				}
			});
			$('#gambar_hasil').attr('src', gambarnya);
			
			if(hasil2!== null){
				$('#hasilnya').html(hasil2);
			}else{
				$('#hasilnya').html(hasil);
			}
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" : jQuery.parseJSON(jqXHR.responseText).message;
            swal('Sorry', errorString, 'error');
        });
	}
};