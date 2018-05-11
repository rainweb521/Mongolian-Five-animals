# 基于蒙古文的五畜网站

## 这又是一个毕业设计，主题是介绍蒙古族的五种动物，马，牛，绵羊，骆驼，山羊，分为前台和后台，前台用户需要登录或注册后才能查看五种动物的信息，每种动物都有单独的页面，信息展示是以目录的信息，在数据库里数据以树状形式存储，每个目录下分别对应着子节点，子节点又对应一堆子节点，动物的每个属性都是一个目录，点进去以后会有详细的介绍子目录或者是解释，每个目录都有对应的图片和音乐可以显示播放，用户还可以留言，这就是前台的大致功能。后台的功能就是管理用户，管理留言，管理五种动物的数据，以为数据都是以树状形式存储，所以有一些些麻烦，后台就是对动物的每个子目录可以修改音乐，图片，或者在子目录下再添加一个子目录，等等功能，整个网站都截图了，下面可以浏览，我还写了一些开发日志，放在页面最后，供参考。

## 网站前台的页面全部都是蒙文的

![](/public/readme/1.jpg)
![](/public/readme/2.jpg)
![](/public/readme/3.jpg)
![](/public/readme/4.jpg)
![](/public/readme/5.jpg)
![](/public/readme/6.jpg)
![](/public/readme/7.jpg)
![](/public/readme/8.jpg)
![](/public/readme/9.jpg)
![](/public/readme/10.jpg)
![](/public/readme/11.jpg)
![](/public/readme/12.jpg)
![](/public/readme/13.jpg)
![](/public/readme/14.jpg)
![](/public/readme/15.jpg)
![](/public/readme/16.jpg)
![](/public/readme/17.jpg)
![](/public/readme/18.jpg)
![](/public/readme/19.jpg)
![](/public/readme/20.jpg)
![](/public/readme/21.jpg)
开发日志
1.完成了在首页的未登录不准查看信息的过滤设置，使用layer弹出作为过滤，可以选择跳转到登录和注册页面，也可以关闭弹窗，以login_state作为判断关键
2.使用框架重写了temege页面和seach页面，使查找效率更高，还可以过滤关键字，加强安全性验证保护
3.在删除时，删除后id已经失效，不能够继续访问，应该找寻到它的上一级id的值,所以在删除成功前，使用当前id查找数据，然后用数据中的ParentId来查找上级id，以便在删除后能定位到上层目录中
4.在主页信息中，根目录是不能出现修改和删除按钮的，因为根目录id为1，但没有id为1的数据

5.更新说明：隔了很久才更新，做了很多改变，注册登录全部改成了蒙文，竖向显示，登录进去的状态显示也是蒙文的，在首页添加了  团队介绍，动物里还添加了音乐功能，可以播放音乐，后台里面，添加了上传音乐的功能，等等

6.修复了用户无法删除的功能，添加了留言板，以及后台显示留言板内容