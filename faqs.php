<?php
    $currentPage = 'faqs';
    include("header.php");
?>


<style>
.accordion  {
      background: #FFF;
      border-radius: 5px;
      padding: 30px;
    }

    .question {
      border-top: 1px solid #d6d6d6;
      padding: 20px;
      cursor: pointer;
      position: relative;
    }
    .question h2  {
      font-size: 20px;
      margin: 0;
      color: black;
    }
    .question .glyphicon {
        font-size: 19px;
    font-weight: 900;
      position: absolute;
      right: 20px;
      top: 0;
      height: 100%;
      display: flex;
      align-items: center;
      color: #C00C00;
      transition: 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) all;
    }

    .answer   {
      max-height: 0;
      overflow: hidden;
      transition: 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) all;
    }
    .answer p {
      padding: 20px;
    }

    .accordion li.open .question .glyphicon {
      transform: rotate(180deg);
    }
    .accordion li.open .answer  {
      max-height: 150px;
    }
    </style>

    
    <div class="row sec5 ">
    <div class="container sec5inside ftco-animate">
    <center>
    <h1 style="font-weight:bold;">FAQs</h1>
    <h1 >Feel free to ask any question...</h1>
    <input type="text" class="textbox-form2 " style="background-color: #ffffff99;color:black; margin-top:20px;" placeholder="Any questions....">
    <input type="submit" class="textbox-form2 buttontwo" style="width:10%; background-color:#a13f43b5; margin-top:20px;">
    </center>
    </div>
    </div>

    <!-- <img src="./images/bg3.jpg" alt="" style="filter: brightness(0.3); width: 100%; height: auto;"> -->
     

    <div class="container ftco-animate">

<div class="accordion">
  <ul class="list-unstyled">
    <li class="open">
      <div class="question">
        <h2>How to sell your car?</h2>
        <span class="glyphicon glyphicon-chevron-down">></span>
      </div>
      <div class="answer">
        <p>Absolutely! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem dolorum dolore totam quo commodi sapiente in, libero, consectetur similique, labore non provident dolorem quibusdam quos, corporis facere est quod deserunt.</p>
      </div>
    </li>
    <li>
      <div class="question">
        <h2>How to sell your car?</h2>
        <span class="glyphicon glyphicon-chevron-down">></span>
      </div>
      <div class="answer">
        <p>Whatever you want! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem dolorum dolore totam quo commodi sapiente in, libero, consectetur similique, labore non provident dolorem quibusdam quos, corporis facere est quod deserunt.</p>
      </div>
    </li>
    <li>
      <div class="question">
        <h2>How to sell your car?</h2>
        <span class="glyphicon glyphicon-chevron-down">></span>
      </div>
      <div class="answer">
        <p>Yes! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem dolorum dolore totam quo commodi sapiente in, libero, consectetur similique, labore non provident dolorem quibusdam quos, corporis facere est quod deserunt.</p>
      </div>
    </li>
    <li>
      <div class="question">
        <h2>How to sell your car?</h2>
        <span class="glyphicon glyphicon-chevron-down">></span>
      </div>
      <div class="answer">
        <p>Yes! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem dolorum dolore totam quo commodi sapiente in, libero, consectetur similique, labore non provident dolorem quibusdam quos, corporis facere est quod deserunt.</p>
      </div>
    </li>
    <li>
      <div class="question">
        <h2>How to sell your car?</h2>
        <span class="glyphicon glyphicon-chevron-down">></span>
      </div>
      <div class="answer">
        <p>Yes! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem dolorum dolore totam quo commodi sapiente in, libero, consectetur similique, labore non provident dolorem quibusdam quos, corporis facere est quod deserunt.</p>
      </div>
    </li>
    <li>
      <div class="question">
        <h2>How to sell your car?</h2>
        <span class="glyphicon glyphicon-chevron-down">></span>
      </div>
      <div class="answer">
        <p>Yes! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem dolorum dolore totam quo commodi sapiente in, libero, consectetur similique, labore non provident dolorem quibusdam quos, corporis facere est quod deserunt.</p>
      </div>
    </li>
    <li>
      <div class="question">
        <h2>How to sell your car?</h2>
        <span class="glyphicon glyphicon-chevron-down">></span>
      </div>
      <div class="answer">
        <p>Yes! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem dolorum dolore totam quo commodi sapiente in, libero, consectetur similique, labore non provident dolorem quibusdam quos, corporis facere est quod deserunt.</p>
      </div>
    </li>

  </ul>
</div>

</div>

<script>
    const accordion = document.querySelector('.accordion');
    const items     = accordion.querySelectorAll('li');
    const questions = accordion.querySelectorAll('.question');

    function toggleAccordion() {
      const thisItem = this.parentNode;

      items.forEach(item => {
        if (thisItem == item) {
          thisItem.classList.toggle('open');   
          return;
        }

        item.classList.remove('open');
      });         
    }

    questions.forEach(question => question.addEventListener('click', toggleAccordion));
  

</script>



<?php
    include("footer.php");
?>