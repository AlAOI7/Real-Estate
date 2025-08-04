<div class="bg-light p-4 my-4 rounded">
    <h4 class="mb-3">اترك تعليقاً</h4>
    <form action="add_comment.php" method="POST">
        <input type="hidden" name="article_id" value="<?php echo htmlspecialchars($id); ?>">
         <div class="row g-3">
            <div class="col-12 col-sm-6">
        
            <label for="name" class="form-label">الاسم</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

          <div class="col-12 col-sm-6">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

          <div class="col-12 col-sm-6">
            <label for="website" class="form-label">الموقع الإلكتروني (اختياري)</label>
            <input type="url" class="form-control" id="website" name="website">
        </div>

          <div class="col-12 col-sm-6">
            <label for="comment" class="form-label">التعليق</label>
            <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
        </div>
          <div class="col-12">
        <button type="submit" class="btn btn-primary w-100">إرسال التعليق</button>
          </div>
         </div>
    </form>
</div>
