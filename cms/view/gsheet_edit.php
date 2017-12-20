<form method="post" enctype="multipart/form-data">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Gsheet</h3>
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="<?php print $this->gsheet[0]->name; ?>" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="">Google sheet url</label>
                <pre>
                    1. insert link to share
                    2. add access to email:
                    dropler@dropler-186313.iam.gserviceaccount.com
                </pre>
                <input type="text" class="form-control" id="url" name="url"
                       value="<?php print $this->gsheet[0]->url; ?>"
                       placeholder="url">
            </div>
            <textarea name="content" id="introduction"
                      class="form-control"><?php print $this->gsheet[0]->content; ?></textarea>
        </div>
    </div>

    <br><br>

    <input type="hidden" id="id" name="id" value="<?php print $this->gsheet[0]->id; ?>"/>
    <input type="hidden" name="gsheet" value="<?php echo rand(0, 50000); ?>"/>
    <button type="submit" name="submit" class="btn btn-default">Save</button>

    <br>
    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Embed code</h3>
        </div>
        <div class="panel-body">


        </div>
    </div>

    <br>
    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Examples</h3>
        </div>
        <div class="panel-body">



        </div>
    </div>


</form>
<br/><br/>