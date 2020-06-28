  "use strict";

  // jquery Map
  $('#vmap').vectorMap({
    map: 'world_en',
    backgroundColor: null,
    color: '#fff',
    hoverOpacity: 0.9,
    borderWidth: 0,
    selectedColor: '#fff',
    enableZoom: false,
    showTooltip: true,
    values: sample_data,
    scaleColors: ['#f1f1f1', '#41CED7'],
    normalizeFunction: 'linear'
  });