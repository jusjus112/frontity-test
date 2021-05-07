<div id="overlay-page">
  <section id="wer-dashboard-widgets">
    <div class="wrap">
      <div class="container">

        <pre>
<!--          --><?php //var_dump($GLOBALS['menu']); ?>
        </pre>

        <section class="widgets-logo">
          <div class="row align-items-center">
            <div class="col col-lg-12 align-self-center">
              <div class="row">
                <div class="col-lg-2">
                  <img class="wer-image-dashboard" src="https://www.wermedia.nl/wp-content/themes/wermedia2020/img/logo-wit.svg">
                </div>
                <div class="col-lg-10">
                  <div class="vertical-widgets row">
                    <?php $items = $GLOBALS['menu']; ?>

                    <?php foreach ($items as $item): ?>
                      <?php if ($item[5] == "menu-comments") continue; ?>
                      <?php if (!empty($item[0])): ?>
                        <div class="col-lg-2">
                          <a class="tooltip-bottom-left card-link" onclick="javascript:void(0)" location="<?= $item[2] ?>" data-tooltip="<?= $item[0] ?>">
                            <div class="card">
                              <i class="bi bi-<?= Utilities::getIconByName($item[5]) ?> text-center"></i>
                            </div>
                          </a>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="widgets">
          <div class="row">
            <?php $items = $GLOBALS['menu']; ?>

            <?php foreach ($items as $item): ?>
              <?php if ($item[5] == "menu-comments") continue; ?>
              <?php if (!empty($item[0])): ?>
                <div class="col col-lg-2">
                  <a class="card-link" onclick="javascript:void(0)" location="<?= $item[2] ?>">
                  <div class="card">
                    <i class="bi bi-<?= Utilities::getIconByName($item[5]) ?> text-center"></i>
                    <h5 class="card-title"><?= $item[0]; ?></h5>
                  </div>
                  </a>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </section>

      </div>
    </div>
  </section>
</div>