# facebook SDK - php

	PHP Facebook SDK ile bağlanma ve kullanıcı bilgisi edinme.

# Kullanımı 

	Eğer projeyi bu şekilde çalıştırmak ve kullanmak isterseniz. 
	fb_config dosyasının içerisinde bulunan "app-id" ve "secret" alanlarını doldurmalısınız. 
	Bu bilgileri nereden alabileceğiz ise ;
		Aşağıda "Facebook Üzerinden Uygulama Oluşturma" kısmında anlatılmıştır.

	iyi günler & çalışmalar .. 

# Facebook SDK Dahil Etme
	
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
	Son adım olarak kaydediyorum. Artık proje ile ilgili tanımlamalarım gerçekleştirildi.

	Konu ile ilgili örnekleri incelemek için ; 

	https://developers.facebook.com/docs
	https://developers.facebook.com/docs/reference/php
	https://developers.facebook.com/docs/php/howto/example_facebook_login	

# fb_config Dosyası

	İlk önce session başlattık.
	Facebook objesi oluşturduk. (Documentta gösteriyor.)
	Kendimize bir dönüş url (redirect) belirledik. 
		* Login olduğunda ve olmadığında nereye yönlendirilecek.
	Eğer login butununa basarsak. Bir accessToken dönüyor. Eğer dönmezse login işlemine geri dönüyor.

	Bir helper değişkeni oluşturduk. Bütün login işlemlerimizin içinde olacağı değişken.

	accessToken varsa istediğimiz bilgileri almış olduk.
	Yoksa ekrana bir login butonu koyduk.

	SKD 'nın kendisi ile alakalı olarak state kısmından bir hata alıyorduk.
	Onuda bir SESSION ataması ile giderdik. İlgili açıklama satırını belirttik.

	İstediğimiz email , name , id ve profil fotoğrafı bilgilerini bir dizi içerisine tanımladık.
	Bu diziyi bir SESSION tanımına eşitledik. 

	Son olarak sayfamızı homepage.php sayfasına yönledirdik.

# INDEX Dosyası

	Login sayfası mantığı ile giriş butonumuzu burada oluşturduk. 
	fb_config dosyamızı buraya include ettik.
	Eğer oturum başlamazsa veya facebook üzerinden veriler alınamazsa; 
		Sistemin bizi giriş yapmaya zorlamak amacıyla yönlendireceği sayfa.

# HOMEPAGE Dosyası

	Bu sayfa da aldığımız ve SESSION atadığımız kullanıcı bilgilerini istediğimiz gibi kullanıyoruz.
	Aynı zamanda oturumu sonlandırmak için bir link belirtiyoruz. 
	

	
