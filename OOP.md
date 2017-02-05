# Nesne Tabanlı Programlama

Nesne Tabanlı Programlama, geliştiricilerin benzer görevleri sınıflar halinde gruplamasına olanak sağlayan bir kodlama stilidir. Bu düşünce, DRY prensibine ve yönetiminin kolay olmasına yardımcı olur.

DRY programlamanın en büyük avantajlarından biri olan düşünce; Eğer programda bir bilgi değiştirildiyse genellikle kodu güncellerken sadece 1 değişiklik gereklidir. Geliştiriciler için kabus haline gelen bir durum da şudur, verinin birden çok defa tanımlanmış olması ve bir değişikliğin yapılacak olması. Bu durumda teker teker veriyi program içerisinde avlamanız gerekecektir. DRY'ın en büyük avantajı ile bu sorundan kurtuluyoruz.

# Objeleri ve Sınıfları Anlayalım

OOP'un derinliklerine inmeden önce, **obje** ve **sınıf** kavramlarını ayırmamız gerekmekte.

Bir **sınıf**, örneğin; bir **ev taslağı**, kağıt üzerinde daha ev oluşmamışken evin boyutunu ve iç parçalarını göstermektedir.

Bir **obje** ise bu taslağın kullanılarak oluşturulduğu evdir. Obje içerisinde tutulan veriler de bu taslağa yüklenen verilerdir. Örneğin duvarları odun olması. 

**Sınıflar; verinin yapısını, işlemleri ve bilgiyi, objeyi oluşturmak için kullanır.**. Aynı sınıftan birden fazla **obje**  inşa edilebilir. Bu objelerin herbiri bir diğerinden bağımsız olacaktır. Dışarıdan aynı gözüken fakat farklı veriler barındıran birden çok obje oluşturabiliriz. 

## Sınıfın Yapısı

Bir sınıf oluşturmak için, `class` anahtar kelimesiyle birlikte sınıf ismi belirtiriz ve kod bloğumuz olan süslü parantezleri `{}` yerleştiririz.

```php
<?php

class BenimSinifim
{
  // Sınıf özellikleri ve işlemleri...
}
```

Bir sınıf oluşturulduktan sonra, bir değişken içerisinde `new` anahtar kelimesiyle türetilebilir.

```php
$obje = new BenimSinifim;
```

## Sınıf Özelliklerinin Belirlenmesi

Bir sınıfa veri eklemek için, **özellikler** yani sınıfa özel değişkenler kullanılır. Normal değişkenlerle aynı şekilde çalışır; farkı objeye bağlı olması ve sadece objeyle beraber erişilebilir olmasıdır. 

`BenimSinifim`'a bir özellik eklemek istiyorsak, sınıf içerisinde değişkeni erişim denetleyicisi ile birlikte oluşturmalıyız. Şimdilik sadece `public` erişim denetleyicisini kullanacağız.

```php
<?php

class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
}
```

İsterseniz özellik belirtirken bunun varsayılan bir değerini belirtmek istemeyebilirsiniz. Bu durumda atama yapmamanız yeterli olacaktır.

Obje içerisindeki özelliğin sadece o objeyle erişilebilir olduğundan bahsetmiştik. Sınıfımızdan türettiğimiz `$obje` değişkenini kullanarak objemizin özelliğine erişebiliriz.

```php
<?php

class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
}

$obje = new BenimSinifim;
echo $obje->ozellik1; // Çıktı: Ben bir sınıf özelliğiyim!
```

Yukarıdaki örnekte de görüldüğü gibi objenin bir özelliğine ve işlemine erişmek için `->` kullanmamız gerekiyor.

## Sınıf Metotlarının Belirlenmesi

Sınıflarımıza veri ekleme işlemini yaptığımıza göre artık bu verileri işleyecek olan metotlarımızı oluşturabiliriz. **Metotlar**, kısaca sınıfa özel fonksiyonlardır. Objelerin yapacağı işlemler birbirinden ayrı olarak metotlarla belirtilir.

Örneğin, `ozellik1` özelliğini değiştirecek ve bize getirecek olan metotlarımızı belirleyelim.

```php
<?php

class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
  
  public function ozellikBelirle($yeniOzellik){
    $this->ozellik1 = $yeniOzellik;
  }
  
  public function ozellikAl() {
    return $this->ozellik1;
  }
}
```

**NOT:** Sınıf içerisinde işlem yapılan objeyi belirtmek için `$this` kullanabilirsiniz.

Bu oluşturduğumuz metotları kullanmak için objeye erişmemiz gerekecektir. Çünkü özellikler gibi metotlar da objeye bağlı olacaktır.

```php
<?php

class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
  
  public function ozellikBelirle($yeniOzellik){
    $this->ozellik1 = $yeniOzellik;
  }
  
  public function ozellikAl() {
    return $this->ozellik1;
  }
}

$obje = new BenimSinifim;
echo $obje->ozellikAl().PHP_EOL; // Çıktı: Ben bir sınıf özelliğiyim!
$obje->ozellikBelirle("Benim özelliğim değişti!"); // Çıktı yok, $obje değişkeninin işaret ettiği objenin özelliği artık 'Benim özelliğim değişti!'.
echo $obje->ozellikAl().PHP_EOL; // Çıktı: Benim özelliğim değişti!
```

## Sınıflarda Miras

**Sınıflar, `extends` anahtar kelimesini kullanarak bir başka sınıfın metotlarını ve özelliklerini miras alabilir.** Örneğin, `BenimSinifim`'ı miras alan bir `IkinciSinif` oluşturalım ve ek bir metot yazalım.

```php
<?php

class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
  
  public function ozellikBelirle($yeniOzellik){
    $this->ozellik1 = $yeniOzellik;
  }
  
  public function ozellikAl() {
    return $this->ozellik1;
  }
}

class IkinciSinif extends BenimSinifim
{
    public function ozellikYaz(){
        echo $this->ozellik1;
    }
}
```

Bu oluşturduğumuz `IkinciSinif` sınıfı ile bir obje oluşturalım ve `ozellikYaz`,`ozellikBelirle` gibi metotlarını kullanalım.

```php
<?php

class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
  
  public function ozellikBelirle($yeniOzellik){
    $this->ozellik1 = $yeniOzellik;
  }
  
  public function ozellikAl() {
    return $this->ozellik1;
  }
}

class IkinciSinif extends BenimSinifim
{
    public function ozellikYaz(){
        echo $this->ozellik1;
    }
}

$obje = new IkinciSinif;
$obje->ozellikYaz(); // Çıktı: Ben bir sınıf özelliğiyim!
$obje->ozellikBelirle("Yeni Özellik");
$obje->ozellikYaz(); // Çıktı: Yeni Özellik
```

Gördüğünüz gibi, `IkinciSinif` sınıfı içerisinde miras alınan sınıftan **metot** ve **özellik** eklemeleri oldu. Eğer `BenimSinifim` da bir başka sınıftan miras alsaydı onlar da aynı şekilde `IkinciSinif` sınıfı içerisinde olacaktı.

## Miras Alınan Özellik ve Metotların Üzerine Yazılması

Bir sınıfı, bir başka sınıftan miras alacak şekilde belirttikten sonra dilerseniz bu mirasla gelen özellik ve metotları değiştirebilirsiniz. Bunun için tekrardan tanımlamanız yeterli olacaktır.

```php
<?php

class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
  
  public function ozellikBelirle($yeniOzellik){
    $this->ozellik1 = $yeniOzellik;
  }
  
  public function ozellikAl() {
    return $this->ozellik1;
  }
}

class IkinciSinif extends BenimSinifim
{
    public $ozellik1 = "IkinciSinif özelliği!";
    
    public function ozellikYaz(){
        echo $this->ozellik1;
    }
}

$obje = new IkinciSinif;
$obje->ozellikYaz(); // Çıktı: IkinciSinif özelliği!
$obje->ozellikBelirle("Yeni Özellik");
$obje->ozellikYaz(); // Çıktı: Yeni Özellik
```

`BenimSinifim` sınıfından gelen `ozellik1` özelliğini `IkinciSinif`' sınıfında üzerine yazdık. Bu işlemin aynısını metotlar için de yapabiliriz.

> Bir metodun tekrardan üzerine yazılmasını istemiyorsak başına `final` anahtar kelimesi ekleyebiliriz.

## Metotların Üzerine Yazarken Üst Sınıfın Metotunu Kullanmak

Miras aldığınız metotu bazı durumlarda korumak isteyebilirsiniz. Örneğin, mirası aldığınız üst sınıfın metodunda yapılan işlemlere ek olarak bir işlem yaptırmak istediğinizde bu yapıyı kullanmanız doğru olacaktır. Çünkü üst metodun olduğu gibi çalışmasını ve sadece ek birkaç işlemin yapılmasını istiyorsunuz. Tekrar tekrar üst sınıftaki kodun yazılmasına gerek yok ve bu DRY prensibine de aykırı olacaktır.

Bu durumda, üst sınıfı işaret etmek için `parent::` kullanacağız. Ardından metodu çağırmamız yeterli olacaktır.

```php
...
class IkinciSinif extends BenimSinifim
{
    public function ozellikYaz()
    {
        echo $this->ozellik1;
    }

    public function ozellikBelirle($yeniOzellik){
        parent::ozellikBelirle($yeniOzellik); // üst sınıftaki metodu çağırdık
        echo $yeniOzellik." atandı!";
    }
}

$obje = new IkinciSinif;
$obje->ozellikYaz(); // Çıktı: Ben bir sınıf özelliğiyim!
$obje->ozellikBelirle("Yeni Özellik"); // Çıktı: Yeni Özellik atandı!
$obje->ozellikYaz(); // Çıktı: Yeni Özellik
```

## Özelliklerin ve Metotların Erişim Denetleyicileri

Objeler, metotlar ve özellikler üzerinde kontrol **erişim denetleyicileri** ile yapılmaktadır. Bu kontrol, metotların ve özelliklerin nerelerden erişilebilir olduğunu belirler. Erişim denetleyicileri şunlardır: `public`, `protected` ve `private`. Bu erişim denetleyicilerine ek olarak `static`, o sınıfın bir türetmeye bağlı kalmadan erişilebilir olmasını sağlar.

### Public Özellikler ve Metotlar

Şu ana kadar metot ve özellikler için _public_ kullandık. Bu, sınıf içerisinde ve dışarıda herhangi bir kısımda erişilebilir olduğunu gösteriyor. Herhangi bir kısıtlama olmadığını açıkça belirtiyor.

### Protected Özellikler ve Metotlar

Bir özellik veya metot `protected` olarak belirlendiği durumlarda, **onun sadece sınıf içerisinde veya onu miras alan sınıflar içerisinde erişilebilir olduğunu gösterir.**

Bunu denemek için aşağıdaki örneği kullanabiliriz.

```php
...
class IkinciSinif extends BenimSinifim
{
    public $ozellik1 = "IkinciSinif özelliği!";
    
    protected function ozellikYaz(){
        echo $this->ozellik;
    }
}

$obje = new IkinciSinif;
$obje->ozellikYaz(); // Çıktı: IkinciSinif özelliği!
$obje->ozellikBelirle("Yeni Özellik"); // Fatal error: Call to protected method IkinciSinif::ozellikYaz()
```

Fakat `ozellikYaz` metodu yerine `BenimSinifim` içerisindeki `ozellikBelirle` metodunu `protected` yapsaydık bu bizim kodumuz için herhangi bir sorun oluşturmayacaktı. Çünkü kalıtım ile geldiğinden erişimimizi kısıtlamayacaktı.

### Private Özellikler ve Metotlar

Bir özellik veya metot `private` olarak belirlenirse **sadece tanımlandığı sınıf içerisinde kullanılabilir.** Bu demek oluyor ki, **bu sınıfı miras olarak alsanız bile `private` özelliklerine ve metotlarına erişemeyeceksiniz.**

Bunu denemek için aşağıdaki örneği kullanabiliriz.

```php
class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
  
  private function ozellikBelirle($yeniOzellik){
    $this->ozellik1 = $yeniOzellik;
  }
  
  public function ozellikAl() {
    return $this->ozellik1;
  }
}

class IkinciSinif extends BenimSinifim
{
    public function ozellikBelirle($yeniOzellik){
        parent::ozellikBelirle($yeniOzellik); // üst sınıftaki metodu çağırdık
        echo $yeniOzellik." atandı!";
    }
}

$obje = new IkinciSinif;
$obje->ozellikYaz(); // Çıktı: IkinciSinif özelliği!
$obje->ozellikBelirle("Yeni Özellik"); // Fatal Error!  Call to undefined method 
```

`IkinciSinif` sınıfımda `ozellikBelirle` metodu `public` olmasına rağmen hata ile karşılaştık. Çünkü `IkinciSinif` içerisinde miras aldığımız `BenimSinifim` sınıfının `ozellikBelirle` metoduna erişmeye çalıştık. Bu metot, `private` olduğu için herhangi bir şekilde erişme şansımız yok.

### Static Özellikler ve Metotlar

Bir metot veya özellik `static` olarak tanımlanırsa, bu sınıftan bir türetme işlemi yapmadan da o özelliğe veya metoda erişebiliriz. 

> Static özelliklerin bir güzel diğer yanı da tanımlanılan verinin bütün kod içerisinde aynı şekilde tutulmasıdır.

Bunu denemek için basit bir örnek yapalım.

```php
<?php

class Sayac
{
    public static $no = 0;
    
    public static function arttir() {
        self::$no++;
    }
}

while(Sayac::$no < 10){ // 0,1,2,3,4,5,6,7,8,9
    echo Sayac::$no;
    Sayac::arttir();
}
```

## Sınıflarda Sihirli Metotlar

Objenin rahat ve esnek kullanımı için, PHP bir çok sihirli metot bulundurmaktadır. Objeyle ilgili çeşitli işlemler yapılırken çağrılan bu metotlar, geliştiricilerin bu durumlar karşısında yapmak istediği işlemleri gerçekleştirir.

### Constructor ve Destructor

Bir obje türetildiğinde, çeşitli birkaç işlemin yapılmasını bekleriz. Örneğin, `Insan` sınıfından bir obje üretilirken bunun **ad soyad**,**yaş**,**cinsiyet** gibi bilgilerini girmek isteyebiliriz. Bu gibi durumlarda; PHP, bir obje yaratıldığında otomatik olarak objenin yaratıldığı sınıfın `__construct()` metodunu çalıştırır.

```php
<?php
class Insan
{
    public $adSoyad;
    public $yas;
    public $cinsiyet;
    
    public function __construct($adSoyad, $yas, $cinsiyet)
    {
        $this->adSoyad = $adSoyad;
        $this->yas = $yas;
        $this->cinsiyet = $cinsiyet;
    }
}
```

Normal bir metot tanımlar gibi sihirli metodumuzu belirttik. Şimdi bu `Insan` sınıfından bir nesne oluşturup bu nesnenin `adSoyad` özelliğini görüntüleyeceğiz.

```php
<?php

$ali = new Insan("Ali Veli", 20, "erkek");
echo $ali->adSoyad; // Çıktı: Ali Veli
```

Aynı şekilde; bir obje sonlandırılırken birkaç işlem yapılması istenebilir. Örneğin; açılan bir dosya varsa kapatılabilir, herhangi bir oturum bilgisi varsa silinebilir veya bir işlem kaydı tutulabilir. Eğer elle nesneyi yok etme işlemini yapmadıysak, varsayılan olarak kodumuz sonlandığında bu işlem gerçekleştirilecektir.

```php
<?php
class Insan
{
    public $adSoyad;
    public $yas;
    public $cinsiyet;
    
    public function __construct($adSoyad, $yas, $cinsiyet)
    {
        $this->adSoyad = $adSoyad;
        $this->yas = $yas;
        $this->cinsiyet = $cinsiyet;
    }
    
    public function __destruct()
    {
        echo "Ali İntihar Etti!";
    }
}
$ali = new Insan("Ali Veli", 20, "erkek");
echo $ali->adSoyad; // Çıktı: Ali Veli
// Çıktı: Ali İntihar Etti!
```

İsterseniz elle bir nesneyi de yok edebileceğinizi belirtmiştik. Bu işlem için de `unset()` fonksiyonunu kullanabilirsiniz.

### Yazıya Dönüştürme (toString)

Eğer kodumuzda biz objeyi ekrana veya başka bir ortama yazmak istersek bu durumda sınıfın `__toString`  metodu çağırılacaktır.

Eğer bu metodu oluşturmamışsak PHP kodumuz hata verecektir. Çünkü objeyi ekrana çıktı verilecek bir yazıya dönüştüremeyecektir.

```php
<?php
class Insan
{
    public $adSoyad;
    public $yas;
    public $cinsiyet;
    
    public function __construct($adSoyad, $yas, $cinsiyet)
    {
        $this->adSoyad = $adSoyad;
        $this->yas = $yas;
        $this->cinsiyet = $cinsiyet;
    }
    
    public function __destruct()
    {
        echo "Ali İntihar Etti!";
    }
    
    public function __toString()
    {
        return $this->adSoyad;
    }
}
$ali = new Insan("Ali Veli", 20, "erkek");
echo $ali; // Çıktı: Ali Veli
// Çıktı: Ali İntihar Etti!
```

### Objenin Çağrılması (invoke)

Objenin içerisindeki bir metodun değil de, objenin kendisi sanki bir fonksiyonmuş gibi çağrıldığı durumlarda `__invoke` metodu çalıştırılacaktır.

```php
<?php
class Insan
{
    public $adSoyad;
    public $yas;
    public $cinsiyet;
    
    public function __construct($adSoyad, $yas, $cinsiyet)
    {
        $this->adSoyad = $adSoyad;
        $this->yas = $yas;
        $this->cinsiyet = $cinsiyet;
    }
    
    public function __invoke($eklenecekYas)
    {
        $this->yas += $eklenecekYas;
    }
}
$ali = new Insan("Ali Veli", 20, "erkek");
$ali(5);
echo $ali->yas; // Çıktı: 25
```

## İsim Alanları (Namespace)

DRY prensibini sisteminizde uygularken kendinizi çok fazla sınıf kalabalığı içerisinde bulabilirsiniz. Bu durumdan dolayı bir sorunu çözmeniz de biraz zorlaşacaktır. OOP kullanırken amacımız bir değişiklik olduğunda kolayca ve çok az yeri değiştirerek bu sorunu çözmekti. Peki bu durumda ne yapacağız? 

Sadece kendi oluşturduğumuz değil, dışardan diğer geliştiricilerden aldığımız sınıflarda da benzer sorunu yaşayacağız. Örneğin sizin oluşturduğunuz bir `Database` sınıfı bulunmakta ve ayrıca kullanmak istediğiniz kütüphanede de bir `Database` sınıfı bulunuyor. Bu durumda ikisi birbirine karışacak ve biri diğerinin üzerine geçecektir.

Bu zamana kadar bu sorunun çözümü için **prefix** yani ön-ek kullanarak sınıf/metot ismi tanımlama kullanıldı. Örneğin, **Wordpress** isimlendirme yaparken `WP_` ön ekini kullandı, yine aynı şekilde `The Zend Framework` benzer şekilde sorunu çözdü. Bunun da şu şekilde absürt sonuçları oldu: `Zend_Search_Lucene_Analysis_Analyzer_Common_Text_CaseInsensitive`

Sınıflarımızı belirli bir şekilde organize etmek için `namespace` anahtar kelimesiyle bir grup içerisine alabiliriz. Ayrıca bu grupları da kendi içerisinde tekrardan gruplayabiliriz. Bu şekilde ne kendi yazdığımız sınıflar karışacak ne de diğer geliştiricilerin sınıflarını sistemimize dahil ederken sorun yaşayacağız.

### İsim Alanı Nasıl Tanımlanır?

Yukarda yazdığımız örneklerde olduğu gibi; varsayılan olarak sınıflar `global` olarak tanımlanır. 

Bir isim alanı belirtmek için `namespace` anahtar kelimesiyle bir isim belirtmeniz gerekir. Bundan sonraki kısımlarda sınıflar bu isim alanı içerisinde yer alacaktır.

```php
<?php

namespace BenimKutuphanem;
```

İsim alanı belirtildikten sonraki satırlar `BenimKutuphanem` isminin altında yer alacaktır. İsim alanlarını alt alta kullanmanız mümkün değil. Yani bir isim alanını bir diğer isim alanı içerisinde **belirtemezsiniz.** Bunun yerine alt isim alanı olarak belirtmek için **\** karakteri kullanılmalıdır. 

```php
<?php

namespace BenimKutuphanem\AltIsimAlani;
namespace BenimKutuphanem\Veritabani\MySQL;
namespace SirketIsmi\Kutuphane\Form;
```

Bir isim alanı altındaki sınıfı kullanmak için isim alanını da eklemeniz gerekmektedir.

```php
<?php
namespace BenimKutuphanem;

class BenimSinifim
{
  public $ozellik1 = "Ben bir sınıf özelliğiyim!";
  
  public function ozellikBelirle($yeniOzellik){
    $this->ozellik1 = $yeniOzellik;
  }
  
  public function ozellikAl() {
    return $this->ozellik1;
  }
}

class IkinciSinif extends BenimSinifim
{
    public function ozellikBelirle($yeniOzellik){
        parent::ozellikBelirle($yeniOzellik); // üst sınıftaki metodu çağırdık
        echo $yeniOzellik." atandı!";
    }
}
...
$obje = new BenimKutuphanem\IkinciSinif; // BenimKutuphanem namespace'inde bulunmadan çağrılması gerekir, aksi takdirde $obje = new IkinciSinif; şeklinde çağrılabilir. Aynı isim alanı içerisinde sınıfları çağırırken isim alanı yazmanıza gerek kalmaz.
...
```

## Arayüzler (Interface) 

Arayüzler, sınıflarda bulunması gereken fonksiyon isimlerini belirtir. Bu sayede sınıflarınızı organize edebilir ve çoğaltılabilir hale getirebilirsiniz. Çünkü belirttiğiniz arayüze uymak zorundalar. Örneğin, kütüphaneniz içerisinde birden çok veritabanı türüne bağlanılabilir halde olmasını istiyorsunuz. Ayrıca DRY prensibi ile de tekrar tekrar aynı kodu yazmak istemiyorsunuz. Bu durumda bütün veritabanı sınıflarınızda belirttiğiniz fonksiyonlar olacak ve siz hangi sınıfın kullanıldığını bilmenize gerek kalmayacaktır.

`MySQL` sınıfınızda da `PostgreSQL` sınıfınızda da `baglan` metodunuz bulunması gerekecektir.

Bir arayüz tanımlamak için, aynı bir sınıf oluşturur gibi yazmanız yalnız `class` yerine `interface` kullanmanız gerekmektedir.

```php
<?php

interface VeritabaniArayuzu {
	public function baglan();
	public function kapat();
	public function ekle();
	public function sec();
	public function sil();
	public function guncelle();
}
```

Bu arayüzü sınıfınızda kullanmak için sınıf tanımlamanızdan sonra `implements` eklemeniz yeterli olacaktır.

```php
<?php

class MySQL implements VeritabaniArayuzu {
	// baglan, kapat, ekle, sec, sil, guncelle metotları gerekli.
}
```

## Soyut Sınıflar (Abstract)

Soyut sınıflar, **türetilemez** yalnız miras olarak alınabilir. 

Soyut bir sınıf miras alınırken (`extends`) `abstract` yani soyut olan tüm metotları sınıfta tanımlanmalıdır. Ayrıca bu metotların aynı erişim denetleyicisine sahip olmalıdır.

```php
<?php

abstract class Canli {
	public $isim;
	public $tur;
	public $yas;
	
	public function yasa()
	{
		$this->yas++;
	}
	
	abstract public function konus();
}

class Insan extends Canli
{
	public function __construct($isim, $yas)
	{
		$this->isim = $isim;
		$this->yas = $yas;
		$this->tur = "insan";
	}

	public function konus()
	{
		return "Merhaba, ben ".$this->isim." ve ".$this->yas." yaşındayım.";
	}
}

$ali = new Insan("Ali", 25);
$ali->yasa();
echo $ali->konus(); // Çıktı: Merhaba, ben Ali ve 26 yaşındayım.
```

## Nesne Yönelimli Kod vs Prosedürel (Düz) Kod

- Kolay Kullanım
- Organize
- Kolay Bakım
- Modüler Yapı
- Gereksiz Bilgiyi Saklama (private, protected)
- Yeniden Kullanım
- Kolay Hata Ayıklama
- Okunabilirlik