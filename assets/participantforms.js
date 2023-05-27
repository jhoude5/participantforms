require(['core/first', 'jquery', 'jqueryui', 'core/ajax'], function(core, $, bootstrap, ajax) {


  $(document).ready(function() {

    // Accordions on forms
    $('.usa-accordion__button').on('keypress', function(e) {
      if(e === 13 || e === 32) {
        if($(this).attr('aria-expanded') === 'false') {
          $(this).removeClass('collapsed');
          $(this).attr('aria-expanded', 'true');
          $(this).parent().next().addClass('show');
        }
        else {
          $(this).attr('aria-expanded', 'false');
          $(this).addClass('collapsed');
          $(this).parent().next().removeClass('show');
        }
      }

    });
    $('.usa-accordion__button').on('click', function() {
      if($(this).attr('aria-expanded') === 'false') {
        $(this).removeClass('collapsed');
        $(this).attr('aria-expanded', 'true');
        $(this).parent().next().addClass('show');
      }
      else {
        $(this).attr('aria-expanded', 'false');
        $(this).addClass('collapsed');
        $(this).parent().next().removeClass('show');
      }
    });
    // Switching agreement checklist based on role selected
    $('.agreement-select input').on('click', function() {
        var idname = $(this).prop('id');
        if(idname === 'id_who_1') {
          $('.agree').removeClass('show');
          $('.agree.state-lead').addClass('show');
        }
        if(idname === 'id_who_0') {
          $('.agree').removeClass('show');
          $('.agree.program-admin').addClass('show');
        }
        if(idname === 'id_who_2') {
          $('.agree').removeClass('show');
          $('.agree.class-teacher').addClass('show');
        }
    });
    $('.agreement-select input').on('change', function(e) {
      var idname = $(e.target).attr('id');
      if(idname === 'id_who_1') {
        $('.information').removeClass('show');
        $('.information.state-staff').addClass('show');
      }
      if(idname === 'id_who_0') {
        $('.information').removeClass('show');
        $('.information.program-admin').addClass('show');
      }
      if(idname === 'id_who_2') {
        $('.information').removeClass('show');
        $('.information.class-teacher').addClass('show');
      }
    });
    $('.information-select input').on('click', function() {
      var idname = $(this).prop('id');
      if(idname === 'id_who_1') {
        $('.information').removeClass('show');
        $('.information.state-staff').addClass('show');
      }
      if(idname === 'id_who_0') {
        $('.information').removeClass('show');
        $('.information.program-admin').addClass('show');
      }
      if(idname === 'id_who_2') {
        $('.information').removeClass('show');
        $('.information.class-teacher').addClass('show');
      }
    });
    $('.information-select input').on('change', function(e) {
        var idname = $(e.target).attr('id');
        if(idname === 'id_who_1') {
          $('.information').removeClass('show');
          $('.information.state-staff').addClass('show');
        }
        if(idname === 'id_who_0') {
          $('.information').removeClass('show');
          $('.information.program-admin').addClass('show');
        }
        if(idname === 'id_who_2') {
          $('.information').removeClass('show');
          $('.information.class-teacher').addClass('show');
        }
    });

    $('.information-select input').each(function() {
      if ($(this).attr('checked')) {
        var idname = $(this).prop('id');
        if(idname === 'id_who_1') {
          $('.information').removeClass('show');
          $('.information.state-staff').addClass('show');
        }
        if(idname === 'id_who_0') {
          $('.information').removeClass('show');
          $('.information.program-admin').addClass('show');
        }
        if(idname === 'id_who_2') {
          $('.information').removeClass('show');
          $('.information.class-teacher').addClass('show');
        }
      }
    });
    $('.agreement-select input').each(function() {
      if ($(this).attr('checked')) {
        var idname = $(this).prop('id');
        if(idname === 'id_who_1') {
          $('.agreement').removeClass('show');
          $('.agreement.state-staff').addClass('show');
        }
        if(idname === 'id_who_0') {
          $('.agreement').removeClass('show');
          $('.agreement.program-admin').addClass('show');
        }
        if(idname === 'id_who_2') {
          $('.agreement').removeClass('show');
          $('.agreement.class-teacher').addClass('show');
        }
      }
    })



  });
});