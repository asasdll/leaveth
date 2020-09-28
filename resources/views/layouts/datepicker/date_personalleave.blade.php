<script>
$(function() {
    var dateFormat = "mm/dd/yy",
        from = $("#from2")
        .datepicker({
           // defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            minDate: 0
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to2").datepicker({
            //defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            minDate: 0
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));

            var date3 = $("#from2").val();
            var date4 = $("#to2").val();
            var dayDiff = date_diff_indays(date3, date4);
            $("#daydiff2").val(dayDiff);
            console.log($("#to2").val());
            console.log($("#from12").val());
            console.log($("#dayDiff2").val());


        });

});
</script>
<div class="row">
    <div class="col-md-4 pr-1">
        <div class="form-group row">
            <label for="text" class="col-sm-3 col-form-label">นับตั้งเเต่</label>
            <div class="col-md-8 pr-1">
                <input class="form-control" type="text" id="from2"  name="from2"  value="">
            </div>
        </div>
    </div>
    <div class="col md-4 pr-1">
        <div class="form-group row">
            <label for="text" class="col-md-3 pr-1 col-form-label">ถึงวันที่</label>
            <div class="col-md-8 pr-1">
                <input class="form-control" type="text" id="to2" name="to2" value=""  >
            </div>
        </div>
    </div>
    <div class="col-md-4 pr">
        <div class="form-group row">
            <label for="text" class="col-md-3 pr-1 col-form-label">มีกำหนด</label>
            <div class="col-md-6 pr-1">
                <input type="text" class="form-control" name="daydiff2" id="daydiff2" value="" readonly  >
            </div>
            <label for="text" class="col-md- pr-1 col-form-label">วัน</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 pr-1">
        <div class="form-group row">
            <label for="text" class="col-md-4 pr-1 col-form-label">ในระหว่างลาสมารถติดต่อข้าพเจ้าได้ที่</label>
            <div class="col-md-8 pr-1">
                <input type="text" class="form-control" name="address" id="address1"  placeholder="Address">
            </div>
        </div>
    </div>
    <div class="col-md-6 pr-1">
        <div class="form-group row">
          
            <label for="text" class="col-md-2 pr-1 col-form-label">เบอร์ติดต่อ</label>
            <div class="col-md-6 pr-1">
                <input type="text" class="form-control" name="tel"  value="">
            </div>
           
        </div>
    </div>
</div>