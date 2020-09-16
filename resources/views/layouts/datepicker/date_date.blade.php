<script>
$(function() {
	var from = $('#from');
	var to = $('#to');
    var dateFormat = "mm/dd/mm/yy",
        from = $("#from")
        .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            minDate: 0
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }
});


</script>
<div class="row">
    <div class="col-md-12 pr-1">
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">เนื่องจาก</label>
            <div class="col-md-8 pr-1">
                <input type="text" class="form-control" name="since" id="text" required>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 pr-1">
        <div class="form-group row">
            <label for="text" class="col-sm-3 col-form-label">นับตั้งเเต่</label>
            <div class="col-md-8 pr-1">
                <input class="form-control" type="text" id="from" name="from" name="date1" required>
            </div>
        </div>
    </div>
    <div class="col md-4 pr-1">
        <div class="form-group row">
            <label for="text" class="col-md-3 pr-1 col-form-label">ถึงวันที่</label>
            <div class="col-md-8 pr-1">
                <input class="form-control" type="text" id="to" name="to" required>
            </div>
        </div>
    </div>
    <div class="col-md-4 pr">
        <div class="form-group row">
            <label for="text" class="col-md-3 pr-1 col-form-label">มีกำหนด</label>
            <div class="col-md-6 pr-1">
                <input type="text" class="form-control" name="da" id="totolDay" required>
            </div>
            <label for="text" class="col-md- pr-1 col-form-label">วัน</label>
        </div>
    </div>
</div>