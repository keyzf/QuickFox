# QuickFox
接口自动化测试系统（Automated Api Testing System）

演示地址：www.quickfox.cn 

登录账号：admin/admin

&nbsp;

## 概述

QuickFox 是用于在线对 HTTP 接口进行测试、管理、自动化回归的开源网页系统。原先是为满足公司内部接口监控需要而开发的平台，而后在推广接口测试的过程中不断完善，于15年作为开源工具发布，原名 LazyBug。在随后几年里，收到许多同行的反馈，对原系统几乎完全进行了重写，更名 QuickFox，希望它能在团队规模化的接口测试推广和管理上，产生较大的效率提升。

QuickFox 在功能设计上部分参照了 PostMan，JMeter 等较流行的开源工具，支持在线进行接口测试，同时也大幅增加了多人协作和自动化回归的能力，以满足团队化管理的需要。此外，系统本身的大部分能力也提供了开放接口，可以方便地进行持续集成，或与其他系统进行对接。目前，该系统已在作者所在团队稳定运行三年多，支撑上千个用例的自动化回归测试。

技术团队的接口自动化回归测试，是通过编写代码框架来完成，还是设计可视化的系统，各有其优缺点。可视化的接口测试管理在近年来逐渐得到重视，也出现了多个商业化产品，其在便捷、低门槛，维护成本上具备一定的优势，相应在灵活性上也会有一些损失。哪种方案最适合自己，需要根据所在团队的人员情况、技术框架、需求目的等多个因素综合判断。

&nbsp;

## 安装

QuickFox 是基于 PHP+MySQL 开发的系统，因此首先需要具备一个基本的运行环境。可以参考的方案有：Apache+PHP+MySQL，或 Nginx+Fastcgi+PHP+MySQL。推荐使用 XAMPP 套装，可以一次性部署全套服务。注意 PHP 需要使用 5.6 以上版本，MySQL Server 需要使用 5.6 以上版本。

基本环境安装完成后，将 QuickFox 解压至站点的根目录（不需要 QuickFox 目录本身，即 index.php 位于根目录下）。而后在 MySQL 中创建名为 quickfox 的数据库，并导入根目录下 quickfox.sql 文件，生成系统需要的数据表。最后，再将 /tmp 目录设为 777 权限（非 Windows 系统），至此安装工作全部完成。

在开始之前，需要进行少量配置工作，访问 {站点域名}/index.php/config ，根据自己的情况输入域名（用于邮件通知中的访问链接）和数据库连接配置并更新。为了安全考虑，如果之后不再需要这个配置页，可以将 config/white.php 文件移除或改名，该页面即失去效用。如果因为一些未知原因导致配置未生效，也可以直接进入 config 目录，修改 system.php 和 database.php 两个文件完成配置。

现在，访问你的站点域名，正常情况下可以看到登录页面，点击下方的系统环境检查，确认各项配置是否正常。PHP-Curl 扩展的支持是必须的，大部分非编译安装的情况下都提供了该模块，在 php.ini 文件里去掉模块导入之前的注释即可。PHP-Sockets 目前暂未使用，可以不用理会。

&nbsp;

## 基本使用

系统的整体设计逻辑为五级管理结构，空间->模块->接口->用例->步骤。

空间用于在较大层面上对测试进行隔离，相对比较独立，适用于划分不同的产品线或部门。而模块用于对空间下的测试进一步进行分类。空间和模块的操作，可以在“项目/项目空间”菜单项中找到，注意将鼠标移至空间（表格行）上方，即可出现空间的附属操作，以及空间下属模块的管理入口，系统中的其他操作均与此类似。

接口是测试的主体，承载了 URL 信息，用例用于补充关于此 URL 的具体内容，例如请求方法（GET/POST/PUT/DELETE），内容类型（TEXT/JSON/XML/...），请求头，请求参数。用例围绕接口（URL）提交不同的测试数据，以达到对接口进行正向、反向完整测试目的。接口和用例的操作，可以在“项目/接口用例”菜单项中找到，点击接口（表格行）即可展开所属的用例列表。

步骤是 Quickfox 比较独特的一个设计，用于解决测试的上下文依赖。例如，我想要测试修改用户信息的接口，完整的一个闭环是：1）调用登录接口获取令牌。2) 调用修改用户信息接口（测试用例的本体）。3) 检查接口返回。 4) 再次调用修改接口重置用户信息完成数据清理。诸如此类的场景还有很多，通过步骤的灵活组合，Quickfox 可以处理非常复杂的测试场景。此还，我们还经常会遇到数据的提取和传递问题，比如例子中第一步的令牌需要做为入参传递给第二步，这些问题在 Quickfox 中均能得到很好的解决。

步骤管理入口可以在用例的附属操作中找到...

未完待续 >>

帮助支持：QQ 32944123
