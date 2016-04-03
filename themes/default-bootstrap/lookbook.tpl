<section id="lookbook">
  <h2>{$category->name} - {$pack->name[1]}</h2>
  <h3>{$pack->price} {$currency->sign}</h3>
  {foreach name=looks from=$looks item=product}
    <a href="{$product->url}">
      <figure>
        <img src="{$product->image}" alt="{$product->name|escape:html:'UTF-8'}" />
        <figcaption>
          <p>{$product->name}</p>
          <p>Original price : {$product->price} {$currency->sign}</p>
        </figcaption>
      </figure>
    </a>
  {/foreach}
</section>