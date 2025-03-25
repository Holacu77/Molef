<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
        exit;
        }
        $pageTitle = "أدوات الإدارة";
        require 'config.php';
        include 'header.php';
        ?>
        <div class="card shadow-sm mb-4">
          <div class="card-body">
              <h2 class="card-title text-center mb-3">أدوات الإدارة</h2>
                  <div class="d-grid gap-2">
                        <a href="manage_centers.php" class="btn btn-danger btn-custom">إدارة المراكز</a>
                              <a href="manage_candidates.php" class="btn btn-warning btn-custom">إدارة المرشحين</a>
                                    <a href="manage_accounts.php" class="btn btn-secondary btn-custom">إدارة الحسابات</a>
                                          <a href="add_user.php" class="btn btn-success btn-custom">إضافة مستخدم جديد</a>
                                                <a href="admin_logout.php" class="btn btn-outline-danger btn-custom">تسجيل الخروج</a>
                                                    </div>
                                                      </div>
                                                      </div>
                                                      <div class="text-center">
                                                        <a href="index.php" class="btn btn-primary btn-custom">عودة إلى الصفحة الرئيسية</a>
                                                        </div>
                                                        <?php include 'footer.php'; ?>