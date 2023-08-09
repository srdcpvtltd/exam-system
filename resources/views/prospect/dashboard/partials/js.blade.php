<script>
    
    $(document).on('change', '#college_state_id', function (event) {
        state_id = $(this).val();
        $.ajax({
            url: '{{url("get_city_against_states")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'state_id': state_id,
            },
        })
        .done(function (data) {
            $('#college_city_id').empty();
            $('#college_city_id').append('<option disabled>Select City</option>');
            for (i=0;i<data.length;i++){
                $('#college_city_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        });
    });
    $(document).on('change', '#temparory_state_id', function (event) {
        state_id = $(this).val();
        $.ajax({
            url: '{{url("get_city_against_states")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'state_id': state_id,
            },
        })
        .done(function (data) {
        $('#temparory_city_id').empty();
        $('#temparory_city_id').append('<option selected disabled>Select City</option>');
        for (i=0;i<data.length;i++){
            $('#temparory_city_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
        }
        });
    });
    $(document).on('change', '#temparory_country_id', function (event) {
        country_id = $(this).val();        
        event.preventDefault();
        $.ajax({
            url: '{{url("get_state_against_countries")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'country_id': country_id,
            },
        })
        .done(function (data) {
            $('#temparory_state_id').empty();
            $('#temparory_state_id').append('<option disabled>Select State</option>');
            for (i=0;i<data.length;i++){
                $('#temparory_state_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        })
    });
    $(document).on('change', '#permenant_state_id', function (event) {
        state_id = $(this).val();
        $.ajax({
            url: '{{url("get_city_against_states")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'state_id': state_id,
            },
        })
        .done(function (data) {
        $('#permenant_city_id').empty();
        $('#permenant_city_id').append('<option selected disabled>Select City</option>');
        for (i=0;i<data.length;i++){
            $('#permenant_city_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
        }
        });
    });
    $(document).on('change', '#permenant_country_id', function (event) {
        country_id = $(this).val();        
        event.preventDefault();
        $.ajax({
            url: '{{url("get_state_against_countries")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'country_id': country_id,
            },
        })
        .done(function (data) {
            $('#permenant_state_id').empty();
            $('#permenant_state_id').append('<option selected disabled>Select State</option>');
            for (i=0;i<data.length;i++){
                $('#permenant_state_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        })
    });
    $(document).on('change', '#same_as_temparory', function (event) {
        if(this.checked){
            $('#permenant_premise_name').val($('#temparory_premise_name').val());
            $('#permenant_plot_no').val($('#temparory_plot_no').val());
            $('#permenant_locality').val($('#temparory_locality').val());
            $('#permenant_sub_locality').val($('#temparory_sub_locality').val());
            $('#permenant_land_mark').val($('#temparory_land_mark').val());
            $('#permenant_village').val($('#temparory_village').val());
            $('#permenant_post_office').val($('#temparory_post_office').val());
            $('#permenant_police_station').val($('#temparory_police_station').val());
            $('#permenant_state_id').val($('#temparory_state_id').val());
            $('#permenant_pin').val($('#temparory_pin').val());
            $('#permenant_premise_name').attr('required',false);
            $('#permenant_plot_no').attr('required',false);
            $('#permenant_locality').attr('required',false);
            $('#permenant_sub_locality').attr('required',false);
            $('#permenant_land_mark').attr('required',false);
            $('#permenant_village').attr('required',false);
            $('#permenant_post_office').attr('required',false);
            $('#permenant_police_station').attr('required',false);
            $('#permenant_state_id').attr('required',false);
            $('#permenant_pin').attr('required',false);
            $('.permenant_fields').hide();
        }else{
            $('#permenant_premise_name').val('');
            $('#permenant_plot_no').val('');
            $('#permenant_locality').val('');
            $('#permenant_sub_locality').val('');
            $('#permenant_land_mark').val('');
            $('#permenant_village').val('');
            $('#permenant_post_office').val('');
            $('#permenant_police_station').val('');
            $('#permenant_state_id').val('');
            $('#permenant_pin').val('');
            $('#permenant_premise_name').attr('required',true);
            $('#permenant_plot_no').attr('required',true);
            $('#permenant_locality').attr('required',true);
            $('#permenant_sub_locality').attr('required',true);
            $('#permenant_land_mark').attr('required',true);
            $('#permenant_village').attr('required',true);
            $('#permenant_post_office').attr('required',true);
            $('#permenant_police_station').attr('required',true);
            $('#permenant_state_id').attr('required',true);
            $('#permenant_pin').attr('required',true);
            $('.permenant_fields').show();
        }
    });
    $(document).on('change', '#nationality', function (event) {
        if($('#nationality').val() == 'Indian'){

            $('.other_nationality').hide();
        }else{
            $('.other_nationality').show();
        }
    });
    $('.edit-btn').click(function(){
        let name_of_exam = $(this).attr('name_of_exam');
        let name_of_board = $(this).attr('name_of_board');
        let attended_school = $(this).attr('attended_school');
        let passing_year = $(this).attr('passing_year');
        let total_marks = $(this).attr('total_marks');
        let marks = $(this).attr('marks');
        let percentage = $(this).attr('percentage');
        let id = $(this).attr('id');
        $('#name_of_exam').val(name_of_exam);
        $('#name_of_board').val(name_of_board);
        $('#attended_school').val(attended_school);
        $('#passing_year').val(passing_year);
        $('#total_marks').val(total_marks);
        $('#marks').val(marks);
        $('#percentage').val(percentage);
        $('#id').val(id);
        $('#updateForm').attr('action','{{route('prospect.academic_qualification.update','')}}' +'/'+id);
    });
    $('.edit-document-btn').click(function(){
        let id = $(this).attr('id');
        $('#document_category_id').val(id);
   });
    $('#student-profile-button').click(function(){
        $('#studentProfileUpdateForm').submit();
    });
    $('#student-profile-create-button').click(function(){
        $('#studentProfileCreateForm').submit();
    });
    $('#student-address-create-button').click(function(){
        $('#studentAddressCreateForm').submit();
    });
    $('#student-address-button').click(function(){
        $('#studentAddressUpdateForm').submit();
    });
    $('#back-button').click(function(){
        $.ajax({
            url: "{{route('prospect.dashboard.get_back_steps')}}",
            method: 'GET',
            success: function(response){
                location.reload();
            }
        });
    });
    $(document).ready(function(){
        var key_value = 1;
        $('.add-more-fields').click(function(){
            $.ajax({
                url: "{{route('prospect.dashboard.get_qualification_fields')}}",
                method: 'post',
                data: {
                    key : key_value,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response){
                    key_value = key_value + 1;
                    $('#academic_qualification_fields').append(response.html);
                }
            });
        });
    });
    
    function removeFields(index)
    {
        $('#remove-'+index).remove();
    }
</script>