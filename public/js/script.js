$(function () { 
    $('header nav a').each(function () {
        var location = window.location.href;
        var link = this.href; 
        if(location == link) {
            $(this).addClass('actives');
        }
    });
});

// fixes

document.addEventListener('mousemove', function() {
  let mfpArrows = document.querySelectorAll('.mfp-arrow');
  let kursor = document.querySelector('.kursor');
  let mfpDown = document.querySelector('.modal-slider .slick-next');
  let mfpDownSecond = document.querySelector('.modal-slider .slick-prev');

  mfpDown.addEventListener('mouseover', function() {
    kursor.classList.add('hovering');
  })

  mfpDown.addEventListener('mouseout', function() {
    kursor.classList.remove('hovering');
  })

  mfpDownSecond.addEventListener('mouseover', function() {
    kursor.classList.add('hovering');
  })

  mfpDownSecond.addEventListener('mouseout', function() {
    kursor.classList.remove('hovering');
  })

  for (let i = 0; i < mfpArrows.length; i++) {
    mfpArrows[i].addEventListener('mouseover', function() {
      kursor.classList.add('hovering');
    })

    mfpArrows[i].addEventListener('mouseout', function() {
      kursor.classList.remove('hovering');
    })
  }
});


// fixes