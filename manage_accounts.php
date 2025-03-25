<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
        exit;
        }
        $pageTitle = "إدارة الحسابات";
        require 'config.php';
        include 'header.php';

        // خيار حذف الكل
        if (isset($_GET['deleteall'])) {
            $stmt = $pdo->prepare("DELETE FROM users");
                $stmt->execute();
                    header("Location: manage_accounts.php");
                        exit;
                        }

                        if (isset($_GET['delete'])) {
                            $user_id = (int) $_GET['delete'];
                                $stmt = $pdo->prepare("DELETE FROM users WHERE id = :user_id");
                                    $stmt->execute(['user_id' => $user_id]);
                                        header("Location: manage_accounts.php");
                                            exit;
                                            }

                                            $stmt = $pdo->query("SELECT * FROM users ORDER BY username");
                                            $users = $stmt->fetchAll();
                                            ?>
                                            <h2 class="text-center mb-3">إدارة الحسابات</h2>
                                            <!-- زر حذف الكل -->
                                            <div class="text-end mb-2">
                                              <a href="manage_accounts.php?deleteall=1" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف جميع الحسابات؟');">حذف الكل</a>
                                              </div>
                                              <div class="mb-3">
                                                <input type="text" id="searchUser" class="form-control" placeholder="ابحث عن حساب...">
                                                </div>
                                                <div class="table-responsive">
                                                  <table class="table table-hover table-bordered" id="usersTable">
                                                      <thead class="table-dark">
                                                            <tr>
                                                                    <th>اسم المستخدم</th>
                                                                            <th>الإجراءات</th>
                                                                                  </tr>
                                                                                      </thead>
                                                                                          <tbody>
                                                                                                <?php if($users): ?>
                                                                                                        <?php foreach($users as $user): ?>
                                                                                                                  <tr>
                                                                                                                              <td><?php echo htmlspecialchars($user['username']); ?></td>
                                                                                                                                          <td>
                                                                                                                                                        <a href="manage_accounts.php?delete=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا الحساب؟');">حذف</a>
                                                                                                                                                                    </td>
                                                                                                                                                                              </tr>
                                                                                                                                                                                      <?php endforeach; ?>
                                                                                                                                                                                            <?php else: ?>
                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                              <td colspan="2" class="text-center">لا توجد حسابات حتى الآن.</td>
                                                                                                                                                                                                                      </tr>
                                                                                                                                                                                                                            <?php endif; ?>
                                                                                                                                                                                                                                </tbody>
                                                                                                                                                                                                                                  </table>
                                                                                                                                                                                                                                  </div>
                                                                                                                                                                                                                                  <script>
                                                                                                                                                                                                                                  document.getElementById('searchUser').addEventListener('keyup', function() {
                                                                                                                                                                                                                                      let filter = this.value.toLowerCase();
                                                                                                                                                                                                                                          let rows = document.querySelectorAll('#usersTable tbody tr');
                                                                                                                                                                                                                                              rows.forEach(row => {
                                                                                                                                                                                                                                                    let username = row.cells[0].textContent.toLowerCase();
                                                                                                                                                                                                                                                          row.style.display = username.includes(filter) ? '' : 'none';
                                                                                                                                                                                                                                                              });
                                                                                                                                                                                                                                                              });
                                                                                                                                                                                                                                                              </script>
                                                                                                                                                                                                                                                              <?php include 'footer.php'; ?>