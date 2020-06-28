$ ->
  # FastClick
  FastClick.attach(document.body)

  # Plugins
  $select2El          = $("[data-plugin='select2']")
  $multiselectEl      = $("[data-plugin='multiselect']")
  $counterUpEl        = $("[data-plugin='counterUp']")
  $maxlengthEl        = $("[data-plugin='maxlength']")
  $TouchSpinEl        = $("[data-plugin='TouchSpin']")
  $asColorPickerEl    = $("[data-plugin='asColorPicker']")
  $daterangepickerEl  = $("[data-plugin='daterangepicker']")
  $datepickerEl       = $("[data-plugin='datepicker']")
  $timepickerEl       = $("[data-plugin='timepicker']")
  $peityPieEl         = $("[data-plugin='peityPie']")
  $peityBarEl         = $("[data-plugin='peityBar']")
  $peityLineEl        = $("[data-plugin='peityLine']")
  $peityDonutEl       = $("[data-plugin='peityDonut']")
  $submenupickerEl    = $("[data-plugin='submenupicker']")
  $DataTableEl        = $("[data-plugin='DataTable']")
  $selectpickerEl     = $("[data-plugin='selectpicker']")
  $summernoteEl       = $("[data-plugin='summernote']")
  $easyPieChartEl     = $("[data-plugin='easyPieChart']")
  $sssEl              = $("[data-plugin='sss']")
  $labelautyEl        = $("[data-plugin='labelauty']")
  $owlslider          = $("[data-plugin='owlslider']")

  $select2El.each ->
    $(this).select2();

  $multiselectEl.each ->
    $(this).multiSelect()

  $counterUpEl.each ->
    $(this).counterUp()

  $maxlengthEl.each ->
    $(this).maxlength()

  $TouchSpinEl.each ->
    $(this).TouchSpin()

  $asColorPickerEl.each ->
    $(this).asColorPicker()

  $daterangepickerEl.each ->
    $(this).daterangepicker()

  $datepickerEl.each ->
    $(this).datepicker
      container: $(this).parent('.datepicker-wrapper')
      todayHighlight: true,
      todayBtn: "linked",

  $timepickerEl.each ->
    $(this).timepicker()

  $peityPieEl.each ->
    $(this).peity('pie')

  $peityLineEl.each ->
    $(this).peity('line')

  $peityBarEl.each ->
    $(this).peity('bar')

  $peityDonutEl.each ->
    $(this).peity('donut')

  $submenupickerEl.each ->
    $(this).submenupicker()

  $DataTableEl.each ->
    $(this).DataTable()

  $selectpickerEl.each ->
    $(this).selectpicker()

  $summernoteEl.each ->
    $(this).summernote
      focus: true
      dialogsInBody: true

  $easyPieChartEl.each ->
    $(this).easyPieChart
      lineWidth: '10'
      barColor: '#2ECC71'

  $sssEl.each ->
    $(this).sss
      slideShow: false

  $labelautyEl.each ->
    $(this).labelauty()

  $owlslider.each ->
    $(this).owlCarousel
      loop: true
      responsive: {
        0: {items: 1}
        600: {items: 3}
        960: {items: 6}
      }

  # data-toggle
  $("[data-toggle='tooltip']").tooltip()

  $("[data-toggle='popover']").popover()

  # jquery ui
  $("[data-jqui='sortable']").sortable
    placeholder: "ui-state-highlight"
    connectWith: '.js-sortable-connet'

  $("[data-jqui='datepicker']").datepicker()

  # grid
  # NOT SUPPORT MOBILE
  if $(window).width() > 544
    $(".gridster > ul").gridster
        widget_margins: [10, 10],
        widget_base_dimensions: [140, 140]

  # Masonry
  gridMasonry = $('.js-grid-wrapper').masonry
                  itemSelector: '.js-grid'
                  columnWidth: '.js-sizer'
                  percentPosition: true

  # js view control
  $('.js-view-btn').on 'click', (e) ->
    e.preventDefault()
    $(this).find('i').toggleClass 'fa-list-ul fa-th'
    $('.js-view-control').toggleClass 'grid-view list-view'

  gridMasonry.imagesLoaded().progress ->
    gridMasonry.masonry('layout')

  # demo Panel
  gridMasonry.on 'click', '.js-grid-expand', (e) ->
    e.preventDefault()
    $(this).parents('.js-grid').toggleClass('expand')
    gridMasonry.masonry();

  gridMasonry.on 'click', '.js-grid-up', (e) ->
    e.preventDefault()
    $(this).find('.icon').toggleClass 'ion-chevron-down ion-chevron-up'
    $(this).parents('.js-grid').find('.panel-body').toggle()
    gridMasonry.masonry();

  # For Demo effect only
  gridMasonry.on 'click', '.js-reload', (e) ->
    e.preventDefault()
    $(this).parents('.js-grid').find('.js-loader')
           .show()
           .removeClass('hidden').animate value: '100', 2000
           .fadeOut().animate value: '0'

  # For Demo effect only
  $('.js-reload').on 'click', (e) ->
    e.preventDefault()
    $(this).parents('.panel').find('.js-loader')
           .show()
           .removeClass('hidden').animate value: '100', 2000
           .fadeOut().animate value: '0'




  # on scrolling
  $(window).bind 'scroll', ->
    if $(window).scrollTop() > $('.topbar-wrapper').height()
      $('body').addClass 'scrolling'
    else
      $('body').removeClass 'scrolling'

  # preload
  $(window).load ->
    $('#preload').delay(350).fadeOut('slow')
    $('body').delay(350).css({'overflow':'visible'})

  # mainmenu
  $('.menu-block-has-sub > a').on 'click', (e) ->
    e.preventDefault()
    $(this).toggleClass 'active'
    $(this).next('.menu-block-sub').slideToggle()
    $(this).parents()
          .siblings('.menu-block-has-sub')
          .children('.menu-block-sub')
          .slideUp().prev('.active').removeClass('active')

  # clock show minibar

  $('.js-minibar-toggler').on 'click', (e) ->
    e.preventDefault()
    $('body').toggleClass('minibar').promise().done ->
      if $('body.layout-drawer').length
        $('body').css 'overflow', 'hidden'
        $('.mainmenu-block').after("<div class='drawer-close'></div>")
        $('.drawer-close').on 'click', (e) ->
          e.preventDefault()
          $('body').removeClass 'minibar'
          $('body').css 'overflow', 'auto'
          $(this).remove()

    $('.layout-sidebar').removeClass 'active'
    if $(window).width() > 998 and ! $('body.layout-drawer').length
      $(this).find('.icon').toggleClass 'ion-navicon-round'

  # For mibile menu
  $('.js-nav-toggler').on 'click', (e) ->
    e.preventDefault()
    $('.topbar-wrapper-nav').addClass 'active'

  $('.js-close-mobile-nav').on 'click', (e) ->
    e.preventDefault()
    $('.topbar-wrapper-nav').removeClass 'active'

  $('.js-search-togger').on 'click', (e) ->
    e.preventDefault()
    $('.topbar-wrapper-search').addClass 'active'

  $('.js-close-search').on 'click', (e) ->
    e.preventDefault()
    $('.topbar-wrapper-search').removeClass 'active'

  $('.sidebar-togger').on 'click', (e) ->
    e.preventDefault()
    $('.layout-sidebar').toggleClass 'active'

  # Keep open
  $('.dropdown-menu a[data-toggle="tab"]').click (e) ->
    e.stopPropagation()
    $(this).tab('show')
