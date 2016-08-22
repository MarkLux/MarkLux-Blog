# Mark Lux's Blog

****

这是一个基于PHP开发的简单的个人博客系统

小白水平 功底很渣 纯粹练手作品orz

****

实现：前端 **Bootstrap** + 后端 **CodeIgniter**

****
## 开发日志

#### 2016-08-17

* 初始化框架 把之前写的代码修改了一部分放进来 减少重复工作（偷懒）

* 大概写了一下首页

#### 2016-08-18

* 做了文章读取界面（纯文本）

* 上网苦寻markdown解析器 尝试markdown-js不理想 后来找到[HyperDown](https://github.com/SegmentFault/HyperDown)这个很不错的后端解析器 还有前端的版本[HyperDown-js](https://github.com/SegmentFault/HyperDown.js)

* 制作用户管理 以及管理员验证

* 添加了后台界面 设置入口的管理员检查（简单的session）

#### 2016-08-19

* 出门探亲 停工

#### 2016-08-20

* 前端界面引入bootstarp，感谢[out_xu](https://github.com/ouxu)制作的界面模板

* 制作了一个简单的新建文章界面（纯html表单）加入实时预览

#### 2016-08-21

* 添加后台的文章编辑 删除

* 自动生成文章更新时间

* 放弃分类管理 改为4个默认分类（觉得麻烦，偷懒）

* 暂时放弃多用户管理 只保留一个管理员账号（机制还保留 删除了注册功能 等待完善）

* 用bootstrap改造了一大票界面

#### 2016-08-22

* 优化分页导航栏和列表界面的显示

* 删除了列表界面每个条目的预览（substr太充数 准备另找方法）

* 修复了数据库底层逻辑（分页显示时候起始位置bug）

* 数据库提取顺序改为按照时间先后