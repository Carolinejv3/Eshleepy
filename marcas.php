 <section class="bg-faded padding-top-3x padding-bottom-3x">
        <div class="container">
          <h3 class="text-center mb-30 pb-2"><?=$texto[6]?></h3>
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }">
		  
		<?php $query=mysqli_query($link,"select * from marcas where estatus='si' order by orden ASC");
              while($row=mysqli_fetch_assoc($query)){?>
			  
			<img class="d-block w-110 opacity-75 m-auto" src="<?=BASE_PATH?>images/<?=$row["foto"]?>" alt="Adidas">  
			  
<?php }
		?> 
		  
		 
		  
		  </div>
        </div>
      </section>