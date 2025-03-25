<?php
require 'auth.php';
$pageTitle = "إضافة مرشح";
require 'config.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $candidate_name = trim($_POST['candidate_name']);
        if (!empty($candidate_name)) {
                $stmt = $pdo->prepare("INSERT INTO candidates (candidate_name) VALUES (:candidate_name)");
                        $stmt->execute(['candidate_name' => $candidate_name]);
                                $message = "تم إضافة المرشح بنجاح!";
                                    } else {
                                            $message = "يرجى إدخال اسم المرشح.";
                                                }
                                                }
                                                include 'header.php';
                                                ?>
                                                <div class="card shadow-sm">
                                                  <div class="card-body">
                                                      <h2 class="card-title text-center mb-3">إضافة مرشح</h2>
                                                          <?php if($message): ?>
                                                                <div class="alert alert-info text-center"><?php echo $message; ?></div>
                                                                    <?php endif; ?>
                                                                        <form method="POST">
                                                                              <div class="mb-3">
                                                                                      <label class="form-label">اسم المرشح</label>
                                                                                              <input type="text" name="candidate_name" class="form-control" placeholder="أدخل اسم المرشح" required>
                                                                                                    </div>
                                                                                                          <div class="d-grid gap-2">
                                                                                                                  <button type="submit" class="btn btn-primary btn-custom">حفظ</button>
                                                                                                                          <a href="index.php" class="btn btn-secondary btn-custom">عودة</a>
                                                                                                                                </div>
                                                                                                                                    </form>
                                                                                                                                      </div>
                                                                                                                                      </div>
                                                                                                                                      <?php include 'footer.php'; ?>