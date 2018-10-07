<?php $this->load->view("layouts/header"); ?>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li>
                     <a class="active" href="<?php echo base_url('privacy'); ?>">API Guide</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page content-section">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="col-md-12 col-xs-12 col-sm-12">
                  <div class="heading-panel">
                  <h3 class="main-title text-left">
                    API Integartion Guide
                  </h3>
               </div>
               <div class="row api-content-header">
                  <!-- Middle Content Area -->
                     <h3>Overview</h3>
                     <p class="content-paragraph">
                      All participants are required to have a paid account status in good standing. It is the participants responsibility to provide an up to date product feed. Participants agree that all information provided in the product feed will be made public. All prices and product availability must be accurate in the provided feed. GunSaleFinder.com reserves the right to refuse or terminate participants in the program for failing to maintain an accurate feed.
                     </p>

                     <h3>Data Type</h3>
                     <p class="content-paragraph">
                      Product feeds can be accepted in JSON or XML format.
                     </p>
                     <h3>Data fields</h3>
                      <p class="content-footer">
                        Note: Each product needs its own unique product identifier “code” so that it can be recognized during the product feed updates. The code should not be repeated.

                        To assure good quality images, submit 313 X 234 sizes of images.
                     </p>
                     <p class="content-paragraph">
                        <h4>JSON Return</h4>
                        <p class="text-space">
                           Below are sample return of the API that should be provided by the dealer.
                        </p>
                        
                        <p class="api-content-code">
                        <?php 
                          
 $code ='{
   "code":"1",
   "title":"Tula Ammo 45 ACP 230 Gr. FMJ Steel Case 500rds",
   "category":"ACSRIES",
   "subcategory":"FIREARM",
   "brand":"AAA",
   "url":"http:\/\/example.com\/product\/tula-ammo-45-acp-230-gr-fmj-steel-case-500rds",
   "price":"100",
   "shipping":"100",
   "UPC":"076683052209",
   "SKU":"5220"
},
{
   "code":"2",
   "title":"SB TACTICAL SBA3 Pistol",
   "category":"ACSRIES",
   "subcategory":"FIREARM",
   "brand":"AAA",
   "url":"http:\/\/example.com\/product\/tula-ammo-45-acp-230-gr-fmj-steel-case-500rds",
   "Price":"100",
   "shipping":"100",
   "UPC":"076683052209",
   "SKU":"5220"
{';
echo highlight_string($code, true);
?></p>
                        <h4>XML Sample Return</h4>
 <p class="api-content-code">
<?php 
 $xml ='<response>
   <products>
      <item>
         <code>1</code>
         <title>Tula Ammo 45 ACP 230 Gr. FMJ Steel Case 500rds</title>
         <category>ACSRIES</category>
         <subcategory>FIREARM</subcategory>
         <brand>AAA</brand>
         <url>http://test.com/product/tula-ammo-45-acp-230-gr-fmj-steel-case-500.jpg</url>
         <price>100</price>
         <shipping>100</shipping>
         <upc>100</upc>
         <sku>100</sku>
      </item>
      <item>
         <code>2</code>
         <title>Tula Ammo 45 ACP 230 Gr. FMJ Steel Case 500rds</title>
         <category>ACSRIES</category>
         <subcategory>FIREARM</subcategory>
         <brand>AAA</brand>
         <url>http://test.com/product/tula-ammo-45-acp-230-gr-fmj-steel-case-500.jpg</url>
         <price>100</price>
         <shipping>100</shipping>
         <upc>100</upc>
         <sku>100</sku>
      </item>
   </products>
</response>';
echo highlight_string($xml, true); ?></p>
</p>
                     <h3>FIELD Description</h3>
                     <p class="content-paragraph">
                       Your API feed should follow the format above to be accepted by the system. Each API Field is explained below.
                     </p>
                     <p>
                     <ul class="text-space">
                        <li>
                           <strong>Code:</strong>  A unique product identifier that can be recognized during the product feed updates. It is an alphanumeric data.
                           <p>
                           Example: 123321, A121B, AAA
                           </p>
                        </li>
                        <li>
                           <strong>Title:</strong> The product name or description
                           <p>
                           Example: Ruger 1702 GP100 Standard Single/Double 357 Magnum 4.2" 6 rd
                           </p>
                        </li>
                        <li>
                           <strong>Category:</strong>   Each product should be under a certain category like Firearms, Accessories, Gun Parts, etc. Please provide in your API the Product <strong>Category Code</strong> using the table below:
                           <div class="clearfix"></div>
                           <div class="col-md-10 col-xs-10 col-sm-10">
                              <table class="table table-bordered table-display">
                              <thead class="black-white-text">
                                 <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                 </tr>
                              </thead>
                              <tbody class="black-text">
                                 <?php  foreach ($category as $cat): ?>
                                    <tr>
                                       <td><?php echo $cat->category_code; ?></td>
                                       <td><?php echo $cat->name; ?></td>
                                    </tr>
                                 <?php endforeach; ?>
                              </tbody>
                              </table>
                           </div>
                        </li> 
                        <li>
                           <div class="clearfix"></div>
                           <strong>Subcategory:</strong> The subcategory provides specific description of the product. Under the Firearms Category, a product can be described further as Handguns, Rifles or Shotguns.  Provide in your API the Sub Category Code of your product following the table below:
                           <div class="col-md-10 col-xs-10 col-sm-10">
                              <table class="table table-bordered table-display">
                                 <thead class="black-white-text">
                                    <tr>
                                       <th>Category Code</th>
                                       <th>Sub Category Code</th>
                                       <th>Name</th>
                                    </tr>
                                 </thead>
                                 <tbody class="black-text">
                                 <?php  foreach ($subcategory as $sub): ?>
                                    <tr>
                                       <td><?php echo $sub->category_code; ?></td>
                                       <td><?php echo $sub->sub_category_code; ?></td>
                                       <td><?php echo $sub->list_name; ?></td>
                                    </tr>
                                 <?php endforeach; ?>
                                 </tbody>
                              </table>
                           </div>
                        </li>
                        <li>
                           <div class="clearfix"></div>
                           <strong>Brand:</strong>  The product brand or manufacturer should be indicated in the API.
                           <p>
                           Example: Glock, Smith & Wesson, Leupold, Muzzy
                           </p>
                        </li>
                        <li>
                           <strong>URL:</strong> The product feed should include a picture of each item.  Include in your API the link from your website where the system can get the product image.
                           <p>
                           Example:

                              JSON Format: http:\/\/yourwebsite.com\/product\/ruger-1702-gp100-standard-357.jpg

                              XML Format: http://yourwebsite.com/product/ruger-1702-gp100-standard-357.jpg
                           </p>
                        </li>
                        <li>
                           <strong>Price:</strong> Indicate the product price. It is a numeric value and no need to put the currency symbol
                           <p>
                           Example: 149.95, 201.00, 1150.99
                           </p>
                        </li>
                        <li>
                           <strong>Shipping:</strong> Provide your shipping fee. Numeric and text value are accepted.
                           <p>
                           Example: $19.95, $10.00, Flat Rate, FREE S/H
                           </p>
                        </li>
                        <li>
                           A 12-digit numeric data which is used to identify each product
                           <p>
                           Example: 887057016050, 847128018828; 079861553396
                           </p>
                        </li>
                        <li>
                           <strong>SKU:</strong>  An alphanumeric data used by the manufacturer to identify their product.
                           <p>
                           Example: 52574, 64221, STCGX45NG
                           </p>
                        </li>
                     </ul>                     
                     </p>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<?php $this->load->view("layouts/pagefooter"); ?>