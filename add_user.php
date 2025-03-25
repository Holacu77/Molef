<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
        exit;
        }
        require 'config.php';

        $message = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                    
                        if ($username === "" || $password === "") {
                                $message = "يرجى ملء جميع الحقول.";
                                    } else {
                                            // التأكد من عدم وجود اسم المستخدم مسبقًا
                                                    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
                                                            $stmt->execute([$username]);
                                                                    if ($stmt->fetch()) {
                                                                                $message = "اسم المستخدم موجود بالفعل.";
                                                                                        } else {
                                                                                                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                                                                                                $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                                                                                                                            if ($stmt->execute([$username, $hashed_password])) {
                                                                                                                                            $message = "تم إضافة المستخدم بنجاح.";
                                                                                                                                                        } else {
                                                                                                                                                                        $message = "حدث خطأ أثناء إضافة المستخدم.";
                                                                                                                                                                                    }
                                                                                                                                                                                            }
                                                                                                                                                                                                }
                                                                                                                                                                                                }
                                                                                                                                                                                                include 'header.php';
                                                                                                                                                                                                ?>
                                                                                                                                                                                                <div class="card shadow-sm mb-4">
                                                                                                                                                                                                  <div class="card-body">
                                                                                                                                                                                                      <h2 class="card-title text-center mb-3">إضافة مستخدم جديد</h2>
                                                                                                                                                                                                          <?php if ($message): ?>
                                                                                                                                                                                                                <div class="alert alert-info text-center"><?php echo $message; ?></div>
                                                                                                                                                                                                                    <?php endif; ?>
                                                                                                                                                                                                                        <form method="post">
                                                                                                                                                                                                                              <div class="mb-3">
                                                                                                                                                                                                                                      <label class="form-label">اسم المستخدم</label>
                                                                                                                                                                                                                                              <input type="text" name="username" class="form-control" required>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                          <div class="mb-3">
                                                                                                                                                                                                                                                                  <label class="form-label">كلمة المرور</label>
                                                                                                                                                                                                                                                                          <input type="password" name="password" class="form-control" required>
                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                      <div class="d-grid gap-2">
                                                                                                                                                                                                                                                                                              <button type="submit" class="btn btn-primary btn-custom">إضافة المستخدم</button>
                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                        </form>
                                                                                                                                                                                                                                                                                                          </div>
                                                                                                                                                                                                                                                                                                          </div>
                                                                                                                                                                                                                                                                                                          <div class="text-center">
                                                                                                                                                                                                                                                                                                            <a href="admin_tools.php" class="btn btn-secondary btn-custom">عودة إلى أدوات الأدمن</a>
                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                            <?php include 'footer.php'; ?>