  <?php
    ini_set('session.cache_limiter', 'public');
    session_cache_limiter(false);
    session_start();
    include("config.php");
    ?>
  <?php include("include/header.php"); ?>
  <!-- Page Header Start -->
  <div class="container-fluid page-header">
      <h1 class="display-3 text-uppercase text-white mb-3">تفاصيل المدونه </h1>

  </div>
  <!-- Page Header Start -->

  <?php


    $id = intval($_GET['id'] ?? 0);
    if ($id <= 0) {
        die("مقال غير صالح");
    }

    $query = "SELECT * FROM blog_articles WHERE id = $id LIMIT 1";
    $result = mysqli_query($con, $query);
    $article = mysqli_fetch_assoc($result);

    if (!$article) {
        die("المقال غير موجود");
    }
    ?>

  <div class="container-fluid py-6 ps-5 pe-0">
      <div class="row g-5">
          <div class="col-lg-8">
              <!-- بداية تفاصيل المدونة -->
              <div class="mb-5">
                  <img class="img-fluid" src="admin/uploads/<?= htmlspecialchars($article['image']) ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                  <h1 class="text-uppercase mb-4"><?php echo htmlspecialchars($article['title']); ?></h1>

                  <?php
                    // عرض الفقرات من النص مع تقسيمها عند وجود سطر جديد
                    $paragraphs = explode("\n", $article['full_details']);
                    foreach ($paragraphs as $paragraph) {
                        if (!empty(trim($paragraph))) {
                            echo '<p>' . htmlspecialchars($paragraph) . '</p>';
                        }
                    }
                    ?>

                  <!-- يمكنك إضافة المميزات من قاعدة البيانات إذا كنت تريد -->
                  <div class="row gx-5 py-2">
                      <div class="col-sm-6 mb-2">
                          <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i> التخطيط المثالي</p>
                          <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i> عمالة محترفة</p>
                          <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i> تنفيذ دقيق</p>
                      </div>
                      <div class="col-sm-6 mb-2">
                          <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i> مواد بناء عالية الجودة</p>
                          <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i> الالتزام بالمواعيد</p>
                          <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i> مراقبة جودة صارمة</p>
                      </div>
                  </div>

                  <a href="blog_list.php" class="btn bg-primary mt-3">العودة إلى قائمة المقالات</a>
              </div>
              <!-- نهاية تفاصيل المدونة -->


              <!-- بداية نموذج التعليق -->


              <div class="bg-light p-5">

              </div>

              <!-- نهاية نموذج التعليق -->
          </div>

          <!-- بداية الشريط الجانبي -->
          <div class="col-lg-4">
              <!-- بداية نموذج البحث -->
              <div class="mb-5">
                  <form action="search.php" method="GET">
                      <div class="input-group">
                          <input type="text" name="q" class="form-control p-3" placeholder="كلمة مفتاحية">
                          <button class="btn bg-primary px-3" type="submit"><i class="fa fa-search"></i></button>
                      </div>
                  </form>
              </div>
              <!-- نهاية نموذج البحث -->

              <!-- بداية الأقسام -->
              <div class="mb-5">
                  <h3 class="text-uppercase mb-4">الأقسام</h3>
                  <div class="d-flex flex-column justify-content-start bg-light p-4">
                      <?php
                        // استعلام لجلب الأقسام من قاعدة البيانات
                        $categories_query = "SELECT * FROM categories ORDER BY name";
                        $categories_result = mysqli_query($con, $categories_query);

                        if (mysqli_num_rows($categories_result) > 0) {
                            while ($category = mysqli_fetch_assoc($categories_result)) {
                                echo '<a class="h6 text-uppercase mb-4" href="category.php?id=' . $category['id'] . '"><i class="fa fa-angle-right me-2"></i>' . htmlspecialchars($category['name']) . '</a>';
                            }
                        }
                        ?>
                  </div>
              </div>
              <!-- نهاية الأقسام -->
              <div class="mb-5">
                  <h3 class="text-uppercase mb-4"> التعليقات </h3>
                  <div class="bg-light p-4">
                      <form action="add_comment.php" method="POST">
                          <input type="hidden" name="article_id" value="<?php echo htmlspecialchars($id); ?>">
                          <div class="row g-3">
                              <div class="col-12 col-sm-6">
                                  <input type="text" name="name" class="form-control bg-white border-0" placeholder="اسمك" style="height: 55px;" required>
                              </div>
                              <div class="col-12 col-sm-6">
                                  <input type="email" name="email" class="form-control bg-white border-0" placeholder="بريدك الإلكتروني" style="height: 55px;" required>
                              </div>
                              <div class="col-12">
                                  <input type="url" name="website" class="form-control bg-white border-0" placeholder="الموقع الإلكتروني" style="height: 55px;">
                              </div>
                              <div class="col-12">
                                  <textarea name="comment" class="form-control bg-white border-0" rows="5" placeholder="التعليق" required></textarea>
                              </div>
                              <div class="col-12">
                                  <button class="btn bg-primary w-100 py-3" type="submit">اترك تعليقك</button>
                              </div>
                          </div>
                      </form>

                  </div>
              </div>
              <!-- بداية المنشورات الحديثة -->
        
              <!-- بداية النص العادي -->
              <!-- <div>
                  <h3 class="text-uppercase mb-4">نص عادي</h3>
                  <div class="bg-light rounded text-center" style="padding: 30px;">
                      <p>نقدم لكم محتوى ثري ومفيد يتناول كافة جوانب العمل والخدمات التي نقدمها. نضمن لكم تجربة مميزة ومفيدة، حيث يمكنكم الاستفادة من خبراتنا في مجالات متعددة.</p>
                      <a href="about.php" class="btn bg-primary py-2 px-4">اقرأ المزيد</a>
                  </div>
              </div> -->
              <!-- نهاية النص العادي -->
          </div>
          <!-- نهاية الشريط الجانبي -->
      </div>
  </div>
  <!-- نهاية قسم المدونة -->
  <?php include("include/footer.php"); ?>