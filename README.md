# facebook API - php

	PHP Facebook API ile bağlanma ve kullanıcı bilgisi edinme.

# Facebook API Dahil Etme
	
	İlk Önce Facebook apisi projeye dahil ediyoruz.
	Kullandığımız API Facebook 'un graph api 'sidir.
	graph api : https://github.com/facebook/php-graph-sdk
	
# Projeye SASS Dahil Etme
	
	Projede kullanmak üzere en jenerik Front-End Framework olan Bootstrap projeye dahil edildi.

# Facebook Üzerinden Uygulama Oluşturma

	https://developers.facebook.com adresine giriş yaptık.

	Burada menüden My Apps sekmesinin altından "Add New App" seçeneğine tıkladık.
	Açılan pencerede bizden bir "Display Name" istemektedir. 
	Buraya istediğiniz bir isim verebilirsiniz.
		*"Display name" ismi belirlerken zaten uyarı alırsınız. 
		Fakat belirtmek istedim. Facebook , fb ve marka ve etiketine benzer isimler belirleyemiyorsunuz. 
	Herneyse bu ismi belirledikten sonra yeni projemizi kur diyoruz. 
	Ardından doğrulama işlemini gerçekleştirip devam ediyoruz.
	
	Ardında Developers Facebook paneline geliyoruz. 
	Buradan yan tarafta bulunan menüden setting > basic seçeneğine tıklayarak devam ediyoruz. 
	Burada uygulama içerisinde kullanacağımız 'id' ve 'secret' değerlerinin bilgileri yer almaktadır. 

	Daha sonra buradan sayfayı biraz aşağıya kaydırarak altta bize sunulan "add platform" seçeneğini tıklıyoruz.
	Karşımıza çıkan pencerede bize uygun uygulamanın ikonuna tıklıyoruz. 
	Biz web üzerinden çalışacağımız için "Website" ikonuna tıklıyoruz. 
	Ardından bize çıkan bir input olacak.
	Buraya ben local de çalıştığım için localhost ta bulunan;
	Proje klasörümün çalıştığı yolu ( dizin - path ) belirtiyorum.	