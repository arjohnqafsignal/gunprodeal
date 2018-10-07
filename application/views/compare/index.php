<?php $this->load->view("layouts/header"); ?>

<?php

    $row = 1;
    $data = array();
    if (count($sessionProduct) > 0 ) {
        foreach ($sessionProduct as $key => $value) {
            $data[$row] = $value;
            $row++;
        }    
    }

    $title1 =  isset($data['1']['title']) ?$data['1']['title'] :'';
    $title2 =  isset($data['2']['title']) ?$data['2']['title'] :'';
    $title3 =  isset($data['3']['title']) ?$data['3']['title'] :'';

    $pix1 = isset($data['1']['image_url']) ?$data['1']['image_url'] : base_url() .'assets/images/posting/car-3.jpg';
    $pix2 = isset($data['2']['image_url']) ?$data['2']['image_url'] : base_url() .'assets/images/posting/car-3.jpg';
    $pix3 = isset($data['3']['image_url']) ?$data['3']['image_url'] : base_url() .'assets/images/posting/car-3.jpg';
?>

<div class="container margin-top-bottom-20 add-to-compare-container">
    <table class="full-width">
        <tr>
            <th class="add-to-compare-col-label"></th>
            <th class="add-to-compare-col padding-left-right-10">
                <div class="input-group margin-bottom-20">
                        <input placeholder="Enter model name" value= "<?=$title1?>" class="form-control" type="text"> 
                        <span class="input-group-btn">
                            <button class="btn btn-default add-to-compare-btn" type="button">Search</button>
                        </span> 
                </div>
                <h3 class="comparison-title"><?=$title1?></h3>
                <div class="image margin-bottom-20"> <img alt="Tour Package" src="<?=$pix1?>" class="img-responsive comparison-img"> </div>
            </th>
            <th class="add-to-compare-col padding-left-right-10">
                <div class="input-group margin-bottom-20">
                        <input placeholder="Enter model name" value= "<?=$title2?>" class="form-control" type="text"> 
                        <span class="input-group-btn">
                            <button class="btn btn-default add-to-compare-btn" type="button">Search</button>
                        </span> 
                </div>
                 <h3 class="comparison-title"><?=$title2?></h3>
                <div class="image margin-bottom-20"> <img alt="Tour Package" src="<?=$pix2?>" class="img-responsive comparison-img" > </div>
            </th>
            <th class="add-to-compare-col padding-left-right-10">
                <div class="input-group margin-bottom-20">
                        <input placeholder="Enter model name" value= "<?=$title3?>" class="form-control" type="text"> 
                        <span class="input-group-btn">
                            <button class="btn btn-default add-to-compare-btn" type="button">Search</button>
                        </span> 
                </div>
                 <h3 class="comparison-title"><?=$title3?></h3>
                <div class="image margin-bottom-20"> <img alt="Tour Package" src="<?=$pix3?>" class="img-responsive comparison-img"> </div>
            </th>
        </tr>
        <tr>
            <td class="padding-left-right-10">UPC</td>
            <td>
                <i class="padding-left-right-10"></i> 
                <?= isset($data['1']['upc']) ?$data['1']['upc'] :'' ?>
            </td>
            <td>
                <i class=" padding-left-right-10"></i>
                <?= isset($data['2']['upc']) ?$data['2']['upc'] :'' ?>
            </td>
            <td>
                <i class=" padding-left-right-10"></i>
                <?= isset($data['3']['upc']) ?$data['3']['upc'] :'' ?>
            </td>
        </tr>
        <tr>
            <td class="padding-left-right-10">SKU</td>
            <td>
                <i class=" padding-left-right-10"></i> 
                <?= isset($data['1']['sku']) ?$data['1']['sku'] :'' ?>
            </td>
            <td>
                <i class=" padding-left-right-10"></i>
                <?= isset($data['2']['sku']) ?$data['2']['sku'] :'' ?>
            </td>
            <td>
                <i class=" padding-left-right-10"></i>
                <?= isset($data['3']['sku']) ?$data['3']['sku'] :'' ?>
            </td>
        </tr>
        <tr>
            <td class="padding-left-right-10">PRICE</td>
            <td>
                <i class=" padding-left-right-10"></i> 
                <?= isset($data['1']['price']) ?$data['1']['price'] :'' ?>
            </td>
            <td>
                <i class=" padding-left-right-10"></i>
                <?= isset($data['2']['price']) ?$data['2']['price'] :'' ?>
            </td>
            <td>
                <i class=" padding-left-right-10"></i>
                <?= isset($data['3']['price']) ?$data['3']['price'] :'' ?>
            </td>
        </tr>
    </table>
</div>


<?php $this->load->view("layouts/pagefooter"); ?>
<?php $this->load->view("home/script"); ?>