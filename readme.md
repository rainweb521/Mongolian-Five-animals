开发日志
1.完成了在首页的未登录不准查看信息的过滤设置，使用layer弹出作为过滤，可以选择跳转到登录和注册页面，也可以关闭弹窗，以login_state作为判断关键
2.使用框架重写了temege页面和seach页面，使查找效率更高，还可以过滤关键字，加强安全性验证保护
3.在删除时，删除后id已经失效，不能够继续访问，应该找寻到它的上一级id的值,所以在删除成功前，使用当前id查找数据，然后用数据中的ParentId来查找上级id，以便在删除后能定位到上层目录中
4.在主页信息中，根目录是不能出现修改和删除按钮的，因为根目录id为1，但没有id为1的数据