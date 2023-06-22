<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@extends("admin.panel")
@section("content")
<form action="admin/news/add_check" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>

        <!-- Form Name -->
        <legend>PRODUCTS</legend>



        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
            <div class="col-md-4">
                <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md"  type="text">

            </div>
        </div>


        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
            <div class="col-md-4">
                <select id="product_categorie" name="category" class="form-control">
                </select>
            </div>
        </div>



        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
            <div class="col-md-4">
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
        </div>

        <!-- Textarea -->

        <!-- Text input-->



        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="comment">COMMENT</label>
            <div class="col-md-4">
                <input id="comment" name="comment" placeholder="COMMENT" class="form-control input-md"  type="text">

            </div>
        </div>

        <!-- Text input-->

                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">main_image</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="image" class="input-file" type="file">
                    </div>
                </div>
                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">auxiliary_images</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="filebutton" class="input-file" type="file">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" type="submit" class="btn btn-primary">Button</button>
                    </div>
                </div>

    </fieldset>
</form>

@endsection
