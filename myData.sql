-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for job
CREATE DATABASE IF NOT EXISTS `job` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `job`;

-- Dumping structure for table job.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titleBlogs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.blogs: ~0 rows (approximately)
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` (`id`, `titleBlogs`, `images`, `description`, `content`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Tìm hiểu cơ chế Lazy Evaluation của Stream trong Java 8', '1636617446.jpg', '<p>rong b&agrave;i viết &ldquo;<a href="https://gpcoder.com/3923-gioi-thieu-ve-stream-api-trong-java-8">Giới thiệu về Stream API trong Java 8</a>&rdquo; , ch&uacute;ng ta đ&atilde; t&igrave;m hiểu về c&aacute;c đặc điểm, c&aacute;c l&agrave;m việc của Stream trong Java 8. Ở b&agrave;i viết n&agrave;y, t&ocirc;i muốn giải th&iacute;ch kỹ hơn về cơ chế&nbsp;<strong>Lazy Evaluation</strong>&nbsp;của Stream trong Java 8.</p>', '<p>Như ch&uacute;ng ta đ&atilde; biết, Stream c&oacute; một đặc điểm rất quan trọng l&agrave; cho ph&eacute;p tối ưu h&oacute;a hiệu xuất của chương tr&igrave;nh th&ocirc;ng qua cơ chế&nbsp;<strong>lazy evaluation</strong>, nghĩa l&agrave; ch&uacute;ng kh&ocirc;ng được thực hiện cho đến khi cần thiết. C&aacute;c hoạt động t&iacute;nh to&aacute;n tr&ecirc;n source data chỉ được thực hiện khi một&nbsp;<strong>terminal operation</strong>&nbsp;được khởi tạo v&agrave; c&aacute;c source element chỉ được sử dụng khi cần.</p>\r\n\r\n<p><a href="https://gpcoder.com/wp-content/uploads/2018/05/java-stream-api.png"><img alt="" src="https://gpcoder.com/wp-content/uploads/2018/05/java-stream-api.png" style="height:406px; width:875px" /></a></p>\r\n\r\n<p>H&atilde;y xem v&iacute; dụ sau:</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>1</p>\r\n\r\n			<p>2</p>\r\n\r\n			<p>3</p>\r\n\r\n			<p>4</p>\r\n\r\n			<p>5</p>\r\n\r\n			<p>6</p>\r\n\r\n			<p>7</p>\r\n\r\n			<p>8</p>\r\n\r\n			<p>9</p>\r\n\r\n			<p>10</p>\r\n\r\n			<p>11</p>\r\n\r\n			<p>12</p>\r\n\r\n			<p>13</p>\r\n\r\n			<p>14</p>\r\n\r\n			<p>15</p>\r\n\r\n			<p>16</p>\r\n\r\n			<p>17</p>\r\n\r\n			<p>18</p>\r\n\r\n			<p>19</p>\r\n\r\n			<p>20</p>\r\n\r\n			<p>21</p>\r\n\r\n			<p>22</p>\r\n\r\n			<p>23</p>\r\n\r\n			<p>24</p>\r\n\r\n			<p>25</p>\r\n\r\n			<p>26</p>\r\n\r\n			<p>27</p>\r\n\r\n			<p>28</p>\r\n\r\n			<p>29</p>\r\n\r\n			<p>30</p>\r\n\r\n			<p>31</p>\r\n\r\n			<p>32</p>\r\n\r\n			<p>33</p>\r\n\r\n			<p>34</p>\r\n\r\n			<p>35</p>\r\n\r\n			<p>36</p>\r\n\r\n			<p>37</p>\r\n\r\n			<p>38</p>\r\n\r\n			<p>39</p>\r\n\r\n			<p>40</p>\r\n\r\n			<p>41</p>\r\n\r\n			<p>42</p>\r\n\r\n			<p>43</p>\r\n\r\n			<p>44</p>\r\n\r\n			<p>45</p>\r\n\r\n			<p>46</p>\r\n\r\n			<p>47</p>\r\n\r\n			<p>48</p>\r\n\r\n			<p>49</p>\r\n\r\n			<p>50</p>\r\n\r\n			<p>51</p>\r\n\r\n			<p>52</p>\r\n\r\n			<p>53</p>\r\n\r\n			<p>54</p>\r\n\r\n			<p>55</p>\r\n\r\n			<p>56</p>\r\n\r\n			<p>57</p>\r\n\r\n			<p>58</p>\r\n\r\n			<p>59</p>\r\n\r\n			<p>60</p>\r\n\r\n			<p>61</p>\r\n\r\n			<p>62</p>\r\n			</td>\r\n			<td>\r\n			<p><code>import</code>&nbsp;<code>java.util.HashMap;</code></p>\r\n\r\n			<p><code>import</code>&nbsp;<code>java.util.Map;</code></p>\r\n\r\n			<p><code>import</code>&nbsp;<code>java.util.function.Predicate;</code></p>\r\n\r\n			<p><code>import</code>&nbsp;<code>java.util.stream.Stream;</code></p>\r\n\r\n			<p><code>import</code>&nbsp;<code>lombok.AllArgsConstructor;</code></p>\r\n\r\n			<p><code>import</code>&nbsp;<code>lombok.Data;</code></p>\r\n\r\n			<p><code>@Data</code></p>\r\n\r\n			<p><code>@AllArgsConstructor</code></p>\r\n\r\n			<p><code>class</code>&nbsp;<code>Employee&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>String&nbsp;name;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>String&nbsp;department;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>int</code>&nbsp;<code>salary;</code></p>\r\n\r\n			<p><code>}</code></p>\r\n\r\n			<p><code>class</code>&nbsp;<code>EmployeeRepository&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>private</code>&nbsp;<code>static</code>&nbsp;<code>final</code>&nbsp;<code>Map&nbsp;employees&nbsp;=&nbsp;</code><code>new</code>&nbsp;<code>HashMap&lt;&gt;();</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>static</code>&nbsp;<code>{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>employees.put(</code><code>1</code><code>,&nbsp;</code><code>new</code>&nbsp;<code>Employee(</code><code>&quot;gpcoder 1&quot;</code><code>,&nbsp;</code><code>&quot;A&quot;</code><code>,&nbsp;</code><code>50</code><code>));</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>employees.put(</code><code>2</code><code>,&nbsp;</code><code>new</code>&nbsp;<code>Employee(</code><code>&quot;gpcoder 2&quot;</code><code>,&nbsp;</code><code>&quot;B&quot;</code><code>,&nbsp;</code><code>100</code><code>));</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>employees.put(</code><code>3</code><code>,&nbsp;</code><code>new</code>&nbsp;<code>Employee(</code><code>&quot;gpcoder 3&quot;</code><code>,&nbsp;</code><code>&quot;A&quot;</code><code>,&nbsp;</code><code>150</code><code>));</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>employees.put(</code><code>4</code><code>,&nbsp;</code><code>new</code>&nbsp;<code>Employee(</code><code>&quot;gpcoder 4&quot;</code><code>,&nbsp;</code><code>&quot;B&quot;</code><code>,&nbsp;</code><code>200</code><code>));</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>}</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>public</code>&nbsp;<code>Employee&nbsp;findById(Integer&nbsp;id)&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>System.out.println(</code><code>&quot;findById: &quot;</code>&nbsp;<code>+&nbsp;id);</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>return</code>&nbsp;<code>employees.get(id);</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>}</code></p>\r\n\r\n			<p><code>}</code></p>\r\n\r\n			<p><code>class</code>&nbsp;<code>EmployeeFilter&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>public</code>&nbsp;<code>static</code>&nbsp;<code>Predicate&nbsp;filterDepartmentEqualsWith(String&nbsp;department)&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>return</code>&nbsp;<code>e&nbsp;-&gt;&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>System.out.println(</code><code>&quot;filterDepartmentEqualsWith: &quot;</code>&nbsp;<code>+&nbsp;e);</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>return</code>&nbsp;<code>e.getDepartment().equals(department);</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>};</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>}</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>public</code>&nbsp;<code>static</code>&nbsp;<code>Predicate&nbsp;filterSalaryGreaterThan(</code><code>int</code>&nbsp;<code>salary)&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>return</code>&nbsp;<code>e&nbsp;-&gt;&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>System.out.println(</code><code>&quot;filterSalaryGreaterThan: &quot;</code>&nbsp;<code>+&nbsp;e);</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>return</code>&nbsp;<code>e.getSalary()&nbsp;&gt;=&nbsp;salary;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>};</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>}</code></p>\r\n\r\n			<p><code>}</code></p>\r\n\r\n			<p><code>public</code>&nbsp;<code>class</code>&nbsp;<code>Java8StreamDeeply&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>public</code>&nbsp;<code>static</code>&nbsp;<code>void</code>&nbsp;<code>main(String[]&nbsp;args)&nbsp;{</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>EmployeeRepository&nbsp;employeeRepository&nbsp;=&nbsp;</code><code>new</code>&nbsp;<code>EmployeeRepository();</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>Integer[]&nbsp;empIds&nbsp;=&nbsp;{&nbsp;</code><code>1</code><code>,&nbsp;</code><code>2</code><code>,&nbsp;</code><code>3</code><code>,&nbsp;</code><code>4</code>&nbsp;<code>};</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>Stream.of(empIds)</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>.map(employeeRepository::findById)</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>.filter(EmployeeFilter.filterSalaryGreaterThan(</code><code>100</code><code>))</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>.filter(EmployeeFilter.filterDepartmentEqualsWith(</code><code>&quot;A&quot;</code><code>))</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code>.findFirst();</code></p>\r\n\r\n			<p><code>&nbsp;&nbsp;&nbsp;&nbsp;</code><code>}</code></p>\r\n\r\n			<p><code>}</code></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Chạy chương tr&igrave;nh tr&ecirc;n, ch&uacute;ng ta c&oacute; kết quả như sau:</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>1</p>\r\n\r\n			<p>2</p>\r\n\r\n			<p>3</p>\r\n\r\n			<p>4</p>\r\n\r\n			<p>5</p>\r\n\r\n			<p>6</p>\r\n\r\n			<p>7</p>\r\n\r\n			<p>8</p>\r\n			</td>\r\n			<td>\r\n			<p><code>findById:&nbsp;</code><code>1</code></p>\r\n\r\n			<p><code>filterSalaryGreaterThan:&nbsp;Employee(name=gpcoder&nbsp;</code><code>1</code><code>,&nbsp;department=A,&nbsp;salary=</code><code>50</code><code>)</code></p>\r\n\r\n			<p><code>findById:&nbsp;</code><code>2</code></p>\r\n\r\n			<p><code>filterSalaryGreaterThan:&nbsp;Employee(name=gpcoder&nbsp;</code><code>2</code><code>,&nbsp;department=B,&nbsp;salary=</code><code>100</code><code>)</code></p>\r\n\r\n			<p><code>filterDepartmentEqualsWith:&nbsp;Employee(name=gpcoder&nbsp;</code><code>2</code><code>,&nbsp;department=B,&nbsp;salary=</code><code>100</code><code>)</code></p>\r\n\r\n			<p><code>findById:&nbsp;</code><code>3</code></p>\r\n\r\n			<p><code>filterSalaryGreaterThan:&nbsp;Employee(name=gpcoder&nbsp;</code><code>3</code><code>,&nbsp;department=A,&nbsp;salary=</code><code>150</code><code>)</code></p>\r\n\r\n			<p><code>filterDepartmentEqualsWith:&nbsp;Employee(name=gpcoder&nbsp;</code><code>3</code><code>,&nbsp;department=A,&nbsp;salary=</code><code>150</code><code>)</code></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Như bạn thấy, chương tr&igrave;nh của ch&uacute;ng ta c&oacute; 4 phần tử nhưng chỉ 3 phần tử được thực thi. Tại sao vậy?</p>\r\n\r\n<p><a href="https://gpcoder.com/wp-content/uploads/2019/09/StreamJava8Deeply.png"><img alt="" src="https://gpcoder.com/wp-content/uploads/2019/09/StreamJava8Deeply.png" style="height:641px; width:892px" /></a></p>\r\n\r\n<p>Trong v&iacute; dụ tr&ecirc;n, t&ocirc;i sử dụng 3&nbsp;<a href="https://gpcoder.com/3923-gioi-thieu-ve-stream-api-trong-java-8/#Vi_duIntermediate_operations">Intermediate operations</a>: 1 map() v&agrave; 2 filter() operations. Ch&uacute;ng ta c&oacute; 4 phần tử ở&nbsp;<a href="https://gpcoder.com/3923-gioi-thieu-ve-stream-api-trong-java-8/#Cach_lam_viec_voi_Stream_trong_Java">Stream source</a>, mỗi phần tử c&oacute; thể sẽ được thực thi 1 lần qua tất cả intermediate operation.</p>\r\n\r\n<p>Đầu ti&ecirc;n, n&oacute; sẽ kiểm tra tất cả c&aacute;c operation tr&ecirc;n phần tử c&oacute; id l&agrave; 1. V&igrave; salary của n&oacute; kh&ocirc;ng th&otilde;a filter salary, n&ecirc;n xử l&yacute; sẽ chuyển sang phần tử kế tiếp &ndash; id l&agrave; 2. Kh&ocirc;ng thực hiện tr&ecirc;n filter deparment.</p>\r\n\r\n<p>Tiếp theo, id 2 chỉ th&otilde;a m&atilde;n điều kiện salary, kh&ocirc;ng th&otilde;a m&atilde;n điều kiện department, n&ecirc;n xử l&yacute; chuyển sang phần tử kế tiếp &ndash; id l&agrave; 3.</p>\r\n\r\n<p>Tại id 3, th&otilde;a m&atilde;n tất cả điều kiện ở tr&ecirc;n v&agrave; Stream evaluate y&ecirc;u cầu&nbsp;<a href="https://gpcoder.com/3923-gioi-thieu-ve-stream-api-trong-java-8/#Vi_du_Terminal_Operations">Terminal Operations</a>&nbsp;<em>findFirst()</em>&nbsp;v&agrave; trả về kết quả.</p>\r\n\r\n<p>C&aacute;c operation tr&ecirc;n c&aacute;c phần tử c&ograve;n lại sẽ kh&ocirc;ng được thực thi &ndash; id 4.</p>\r\n\r\n<p>C&oacute; thể thấy rằng, Stream hoạt động tuần tự tr&ecirc;n từng phần tử của source, duyệt qua tất cả c&aacute;c immediate operations, rồi đến terminal operation, cuối c&ugrave;ng mới chuyển sang phần tử kế tiếp (c&oacute; thể kh&ocirc;ng chuyển sang phần tử kế tiếp nếu đ&atilde; th&otilde;a m&atilde;n mong muốn của terminal operation).</p>\r\n\r\n<p>T&oacute;m lại, qu&aacute; tr&igrave;nh xử l&yacute; c&aacute;c Stream một c&aacute;ch lười biếng (lazy) cho ph&eacute;p tr&aacute;nh việc kiểm tra tất cả dữ liệu khi kh&ocirc;ng cần thiết. C&aacute;ch l&agrave;m n&agrave;y gi&uacute;p cho Stream hoạt động rất hiệu quả khi c&oacute; nhiều intermediate operation v&agrave; nguồn dữ liệu l&agrave; lớn.</p>\r\n\r\n<p>B&agrave;i viết đến đ&acirc;y l&agrave; hết, sau b&agrave;i n&agrave;y hy vọng c&aacute;c bạn hiểu r&otilde; hơn về Stream trong Java 8 v&agrave; vận dụng n&oacute; th&iacute;ch hợp để đạt được hiệu quả tốt hơn.</p>', 1, '2021-11-11 07:57:26', '2021-11-11 07:57:42'),
	(2, 'Tuốt tuồn tuột về Java 8 – những thay đổi lớn!', '1636617604.jpg', '<p>Java 8 xuất hiện với nhiều cải tiến r&otilde; rệt, h&atilde;y c&ugrave;ng Kieblog t&igrave;m hiểu xem nhưng thay đổi lớn n&agrave;o đ&atilde; gi&uacute;p Java 8 trở n&ecirc;n&nbsp;<strong>mạnh mẽ</strong>&nbsp;v&agrave;&nbsp;<strong>linh động hơn</strong>.</p>', '<h2>1. Phương thức forEach()</h2>\r\n\r\n<p>Cập nhật n&agrave;y đ&uacute;ng ra th&igrave; l&agrave;&nbsp;<strong>qu&aacute; chậm trễ</strong>&nbsp;so với .NET. Visual Basic hay C# đều đ&atilde; c&oacute;&nbsp;<strong>forEach</strong>&nbsp;từ l&acirc;u. H&atilde;y qu&ecirc;n đi những c&acirc;u for xưa cũ để chuyển qua sử dụng&nbsp;<strong>ForEach</strong></p>\r\n\r\n<p>Phương thức n&agrave;y cũng được hỗ trợ tốt bởi&nbsp;<strong>Iterator (java.lang.Interable)</strong>. C&ugrave;ng xem x&eacute;t v&iacute; dụ add tất cả c&aacute;c đối tượng i v&agrave;o list như sau:</p>\r\n\r\n<h2>2. Java 8 Lambda</h2>\r\n\r\n<p>Nhắc tới Java 8 m&agrave; kh&ocirc;ng nhắc tới&nbsp;<strong>Lambda</strong>&nbsp;qủa thật l&agrave; một sự thiếu s&oacute;t to lớn. Lambda gi&uacute;p cho&nbsp;<strong>functional programming (lập tr&igrave;nh h&agrave;m)</strong>&nbsp;trở n&ecirc;n&nbsp;<strong>đơn giản hơn</strong>&nbsp;nhiều.</p>\r\n\r\n<p>Syntax:&nbsp;<strong>parameter -&gt; expression body</strong>. Dấu mũi t&ecirc;n biểu thị cho reference (tham chiếu tới c&aacute;i g&igrave; đ&oacute;)</p>\r\n\r\n<p>Java Lambda liệt k&ecirc; th&agrave;nh 4 loại sau đ&acirc;y:</p>\r\n\r\n<h2>3. Stream API</h2>\r\n\r\n<p>Sự xuất hiện của Stream trong Java 8 như l&agrave; sự&nbsp;<strong>cứu rỗi</strong>&nbsp;cho c&aacute;c&nbsp;<strong>đoạn source loằng ngoằng trong Java</strong>. Nay với Stream, tất cả chỉ g&oacute;i gọn trong một d&ograve;ng code.</p>\r\n\r\n<p>Đối với Stream th&igrave; Kieblog đ&atilde; c&oacute; một b&agrave;i viết tương đối chi tiết v&agrave; đặc sắc (<a href="https://kieblog.vn/stream-trong-java8-la-gi/" target="_blank">Tuốt tuồn tuột về Stream trong Java 8</a>).</p>\r\n\r\n<h2>4. Method reference</h2>\r\n\r\n<p>So với c&aacute;c ng&ocirc;n ngữ như&nbsp;<strong>Scala</strong>&nbsp;hay&nbsp;<strong>Ruby on Rail</strong>&nbsp;đ&atilde; c&oacute; từ l&acirc;u. Method Reference cũng chỉ mới xuất hiện tr&ecirc;n Java 8,&nbsp;<strong>kh&aacute; trễ nhưng c&oacute; c&ograve;n hơn kh&ocirc;ng</strong>.</p>\r\n\r\n<p>Từ sau khi được release tr&ecirc;n bản Java 8, Method Reference gi&uacute;p code dễ đọc hơn, đỡ rườm r&agrave;, một số trường hợp c&ograve;n dễ hiểu hơn cả&nbsp;<a href="https://kieblog.vn/java-lambda-happy-and-you-know-it" target="_blank">Lambda</a>.</p>\r\n\r\n<p>Sơ bộ c&oacute; thể chia Method Reference th&agrave;nh 4 loại ch&iacute;nh:</p>\r\n\r\n<h3>4.1 Reference tới phương thức static</h3>\r\n\r\n<p>C&aacute;c refer n&agrave;y kh&aacute; sử dụng, với syntax l&agrave;&nbsp;<strong><em>ContainingClass::methodName.</em></strong></p>\r\n\r\n<p>C&ugrave;ng xem x&eacute;t v&iacute; dụ sau đ&acirc;y:</p>\r\n\r\n<pre>\r\n// C&aacute;ch viết n&agrave;y sử dụng lambda kiểm tra i c&oacute; tồn tại trong list kh&ocirc;ng\r\nboolean isVisible = list.stream().anyMatch(i -&gt; Item.isVisible(i));</pre>\r\n\r\n<p>C&ograve;n đ&acirc;y l&agrave; c&aacute;ch sử dụng Java 8 method reference</p>\r\n\r\n<pre>\r\n// Chỉ đơn giản sử dụng ::, kh&ocirc;ng cần care param, kh&aacute; gọn\r\nboolean isVisible = list.stream().anyMatch(Item::isVisible);</pre>\r\n\r\n<h3>4.2 Reference tới instance của method</h3>\r\n\r\n<p>Khi new l&ecirc;n một instance method. Syntax c&oacute; hơi kh&aacute;c hơn ch&uacute;t x&iacute;u:&nbsp;<strong>c<em>ontainingInstance::methodName</em></strong></p>\r\n\r\n<pre>\r\n// C&aacute;c d&ugrave;ng tương tự\r\nItem item = new Item()\r\nboolean isVisible = list.stream().anyMatch(item::isVisible())</pre>\r\n\r\n<h3>4.3 Reference tới&nbsp;<strong>Instance Method của Object c&aacute;c kiểu đặc biệt</strong></h3>\r\n\r\n<p>Loại n&agrave;y c&oacute; syntax:&nbsp;<strong>C<em>ontainingType::methodName.</em></strong>&nbsp;Trường hợp nếu sử dụng với String, Long, Integer, &hellip; đều sử dụng được tất cả c&aacute;c instance method</p>\r\n\r\n<pre>\r\n// T&iacute;nh tổng c&aacute;c String item trong list kh&ocirc;ng empty\r\nint count = list.stream().filter(String::isEmpty).count();</pre>\r\n\r\n<h3>4.4 Reference tới&nbsp;<strong>Constructor</strong></h3>\r\n\r\n<p>Loại n&agrave;y c&oacute; &iacute;t bạn nhớ (sử dụng với từ kh&oacute;a&nbsp;<strong>::new</strong>), nhưng thực tế vẫn c&oacute; thể reference tới&nbsp;<strong>constructor</strong>&nbsp;theo kiểu như sau:</p>\r\n\r\n<pre>\r\n// T&iacute;nh tổng c&aacute;c String item trong list kh&ocirc;ng empty\r\nStream stream = list.stream().map(Item::new);</pre>\r\n\r\n<h2>5. Optional</h2>\r\n\r\n<p>Trước khi Java 8 xuất hiện, để handle c&aacute;c trường hợp xuất hiện Exception thường rất vất vả.&nbsp;<strong>Catch đủ thứ, lỗi n&agrave;o c&oacute; thể văng ra th&igrave; catch lỗi đ&oacute;</strong>. Đ&ocirc;i khi l&agrave; hoa cả mắt xem lỗi đ&oacute; catch ở đ&acirc;u.</p>\r\n\r\n<p>Class&nbsp;<strong>Optional </strong>&nbsp;xuất hiện, gi&uacute;p handle c&aacute;c khả năng văng&nbsp;<a href="https://kieblog.vn/doi-dieu-thu-vi-ve-null-trong-java/" target="_blank">NPE (Null Pointer Exception)</a>.</p>\r\n\r\n<p>Handle NPE với&nbsp;<strong>Optional</strong>&nbsp;r&otilde; r&agrave;ng&nbsp;<strong>dễ hơn hẳn</strong>, cho ph&eacute;p ta cấu h&igrave;nh một số việc cần l&agrave;m khi gặp NPE, trường hợp kh&ocirc;ng c&oacute;, chỉ đơn giản l&agrave; thực thi một đoạn code n&agrave;o đ&oacute;.</p>\r\n\r\n<pre>\r\n// Lấy ra một list, nếu list kh&aacute;c null th&igrave; trả về list\r\n// Nếu list null th&igrave; cần new ArrayList&lt;&gt;\r\nList listA = doAnyThingToGetList();\r\nList listB = list != null ? list : new ArrayList&lt;&gt;();</pre>\r\n\r\n<p>Sau khi &aacute;p dụng Optional:</p>\r\n\r\n<pre>\r\n// Đối với Java 8 Optional - chỉ đơn giản l&agrave; một d&ograve;ng code\r\nList listB = doAnyThingToGetList().orElseGet(() -&gt; new ArrayList&lt;&gt;());</pre>', 1, '2021-11-11 08:00:04', '2021-11-11 08:00:19');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;

-- Dumping structure for table job.career
CREATE TABLE IF NOT EXISTS `career` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_career` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.career: ~0 rows (approximately)
/*!40000 ALTER TABLE `career` DISABLE KEYS */;
INSERT INTO `career` (`id`, `name_career`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Ngân Hàng', 1, '2021-11-11 01:58:04', '2021-11-11 01:58:04'),
	(2, 'Outsource', 1, '2021-11-11 01:58:10', '2021-11-11 01:58:10'),
	(3, 'Dịch vụ viễn thông', 1, '2021-11-11 01:58:15', '2021-11-11 01:58:15'),
	(4, 'Product', 1, '2021-11-11 01:58:25', '2021-11-11 01:58:25'),
	(5, 'Kinh doanh', 1, '2021-11-11 01:59:00', '2021-11-11 01:59:00'),
	(6, 'Dịch vụ', 1, '2021-11-11 01:59:10', '2021-11-11 01:59:10');
/*!40000 ALTER TABLE `career` ENABLE KEYS */;

-- Dumping structure for table job.company
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameCompany` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officeAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aboutCompany` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `scale` int(11) NOT NULL DEFAULT '1' COMMENT 'Quy mô công ty',
  `career_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welfare_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vip` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.company: ~0 rows (approximately)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`id`, `nameCompany`, `officeAddress`, `logo`, `website`, `aboutCompany`, `scale`, `career_id`, `welfare_id`, `vip`, `created_at`, `updated_at`) VALUES
	(1, 'Colonial Stores', '1', '1636596190.png', 'google.com', '<h6 class="fz17 mb-2" style="font-size: 17px; overflow-wrap: break-word; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; color: rgb(57, 62, 70);">Theo cách của bạn</h6><div style="overflow-wrap: break-word; font-size: 14px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; color: rgb(57, 62, 70);"><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">1. Giới thiệu về Viettel Digital:</p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">Viettel Digital – Tổng Công ty thành viên thứ 8 của Tập đoàn Công nghiệp – Viễn thông Quân đội</p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">Sự ra đời của Tổng Công ty nhằm tạo nền móng cho quá trình chuyển dịch số, thực hiện chiến lược phát triển của Viettel trong giai đoạn mới – giai đoạn Kiến tạo xã hội số. Từ nay tới 2025, Tổng Công ty đặt hai mục tiêu trọng tâm lớn: Có 26 triệu khách hàng trên hệ sinh thái; phát triển 600.000 điểm chấp nhận thanh toán &amp; cung cấp dịch vụ.&nbsp;</p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;"><span style="font-weight: 700;">Sứ mệnh của chúng tôi</span></p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">- Phổ cập dịch vụ số từ thành thị tới nông thôn</p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">- Bùng nổ thanh toán số với phương thức Mobile Banking</p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">- Là nền tảng, hạ tầng tài chính số - thương mại số</p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">- Góp phần giữ gìn nền kinh tế nước nhà</p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;"><span style="font-weight: 700;">Sản phẩm của chúng tôi</span></p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">- Lĩnh vực tài chính số: Hệ sinh thái và ngân hàng số ViettelPay, ViettelPay Pro, Bank Plus, Mobile Money</p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;">- Lĩnh vực dịch vụ dữ liệu: Triển khai dịch vụ Digital marketing, Quảng cáo số dựa trên dữ liệu điện tử, Big data</p></div>', 2, '["1","2"]', '["2","3"]', 1, NULL, '2021-11-13 10:45:01'),
	(2, 'Apple Store', '3', '1636613487.png', 'google.com', '<p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70); text-align: justify;"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">【Company Information】</span></p><ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-size: 15px; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Company Naem : YRGLM VIET NAM Co.,LTD</span></li><li style="text-align: justify;"><span style="font-size: 15px; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Established day : 2013年12月10日</span></li><li style="text-align: justify;"><span style="font-size: 15px; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Company Address : Robot Tower, 308-308C Dien Bien Phu, Ward 4, District 3, Ho Chi Minh City</span></li><li style="text-align: justify;"><span style="font-size: 15px; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Company Staff : 40人</span></li><li style="text-align: justify;"><span style="font-size: 15px; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Capital : 4.000.000.000 VND</span></li><li style="text-align: justify;"><span style="font-size: 15px; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Mother company : https://www.yrglm.co.jp/company/</span></li></ul>', 3, '["2","4"]', '["3","4"]', 0, NULL, '2021-11-11 06:51:27'),
	(3, 'Amazon', '5', '1636617095.png', 'google.com', '<h6 class="fz17 mb-2" style="font-size: 17px; overflow-wrap: break-word; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; color: rgb(57, 62, 70);">Digitalize your market</h6><div style="overflow-wrap: break-word; font-size: 14px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; color: rgb(57, 62, 70);"><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; color: rgb(33, 37, 41);">Our Company: Secomm Solution Consulting - previously known as Secomm or Saigon Ecommerce Solutions - has been established since Jan 2014. We mainly work with clients from Australia, but not limited to that area, we have nice clients in Singapore and Vietnam as well. As the name can tell, we are a web development company that is specialised in providing solutions to retail stores using Magento platform, helping them to sell their products/services online.&nbsp;</span></p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; color: rgb(33, 37, 41);">Our Team: Secommers include talented developers that are chosen carefully. Our core team members have great experience in system integration between Magento and 3rd party systems like payment gateways, shipping providers, Address Validation Services, ERP, POS, CRM, email marketing systems, etc...&nbsp;</span></p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; color: rgb(33, 37, 41);">Our Development Process: At Secomm, we use Zoho and its ecosystem products to manage projects and tasks, with Agile Methodology, which ensure tasks and projects are done properly and on time - BUT 1 rule on top of everything: QUALITY.&nbsp; We also use Bitbucket for source control, implement Bitbucket Pipelines to automate the build process and deployment.&nbsp;</span></p><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px; text-align: justify;"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; color: rgb(33, 37, 41);">Our Clients: We have worked with many of Australian clients as well as Singapore and Vietnam, some of them are: - Laybyland.com.au / Shopzero.com.au / Mylayby.com - Jasnor.com.au / Jasnor.co.nz - Pushys.com.au - Rodshop.com.au - Bevilles.com.au - Optergy.com - Trenthamestate.com.au - Eldertonwine.com.au - Eurekaskydeck.com.au.</span></p></div>', 1, '["1"]', '["2","3","4"]', 0, NULL, '2021-11-11 07:51:35');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping structure for table job.company_user_favorite
CREATE TABLE IF NOT EXISTS `company_user_favorite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.company_user_favorite: ~0 rows (approximately)
/*!40000 ALTER TABLE `company_user_favorite` DISABLE KEYS */;
INSERT INTO `company_user_favorite` (`id`, `user_id`, `company_id`, `created_at`, `updated_at`) VALUES
	(3, 6, 1, '2021-11-13 10:15:57', '2021-11-13 10:15:57'),
	(5, 5, 1, '2021-11-13 10:24:21', '2021-11-13 10:24:21'),
	(6, 5, 3, '2021-11-13 10:40:56', '2021-11-13 10:40:56'),
	(7, 5, 2, '2021-11-13 10:41:45', '2021-11-13 10:41:45'),
	(8, 6, 3, '2021-11-13 10:42:09', '2021-11-13 10:42:09'),
	(9, 7, 1, '2021-11-13 10:44:21', '2021-11-13 10:44:21');
/*!40000 ALTER TABLE `company_user_favorite` ENABLE KEYS */;

-- Dumping structure for table job.cv_submit
CREATE TABLE IF NOT EXISTS `cv_submit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_submit_id` int(11) DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.cv_submit: ~0 rows (approximately)
/*!40000 ALTER TABLE `cv_submit` DISABLE KEYS */;
INSERT INTO `cv_submit` (`id`, `name`, `telephone`, `email`, `post_submit_id`, `cv`, `created_at`, `updated_at`) VALUES
	(1, 'Nguyễn Văn Tèo', '02541265412', 'ungvien@gmail.com', 1, '1636798387.pdf', '2021-11-13 10:13:35', '2021-11-13 10:13:35'),
	(2, 'Nguyễn thị ánh', '0395875544', 'ungvien12@gmail.com', 2, '1636798541.pdf', '2021-11-13 10:16:03', '2021-11-13 10:16:03'),
	(5, 'Nguyễn thị ánh', '0395875544', 'ungvien12@gmail.com', 3, '1636798541.pdf', '2021-11-13 10:21:17', '2021-11-13 10:21:17');
/*!40000 ALTER TABLE `cv_submit` ENABLE KEYS */;

-- Dumping structure for table job.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table job.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.locations: ~0 rows (approximately)
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`id`, `name`, `code`, `division_type`, `codename`, `phone_code`, `created_at`, `updated_at`) VALUES
	(1, 'Thành phố Hà Nội', '1', 'thành phố trung ương', 'thanh_pho_ha_noi', '24', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(2, 'Tỉnh Hà Giang', '2', 'tỉnh', 'tinh_ha_giang', '219', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(3, 'Tỉnh Cao Bằng', '4', 'tỉnh', 'tinh_cao_bang', '206', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(4, 'Tỉnh Bắc Kạn', '6', 'tỉnh', 'tinh_bac_kan', '209', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(5, 'Tỉnh Tuyên Quang', '8', 'tỉnh', 'tinh_tuyen_quang', '207', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(6, 'Tỉnh Lào Cai', '10', 'tỉnh', 'tinh_lao_cai', '214', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(7, 'Tỉnh Điện Biên', '11', 'tỉnh', 'tinh_dien_bien', '215', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(8, 'Tỉnh Lai Châu', '12', 'tỉnh', 'tinh_lai_chau', '213', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(9, 'Tỉnh Sơn La', '14', 'tỉnh', 'tinh_son_la', '212', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(10, 'Tỉnh Yên Bái', '15', 'tỉnh', 'tinh_yen_bai', '216', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(11, 'Tỉnh Hoà Bình', '17', 'tỉnh', 'tinh_hoa_binh', '218', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(12, 'Tỉnh Thái Nguyên', '19', 'tỉnh', 'tinh_thai_nguyen', '208', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(13, 'Tỉnh Lạng Sơn', '20', 'tỉnh', 'tinh_lang_son', '205', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(14, 'Tỉnh Quảng Ninh', '22', 'tỉnh', 'tinh_quang_ninh', '203', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(15, 'Tỉnh Bắc Giang', '24', 'tỉnh', 'tinh_bac_giang', '204', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(16, 'Tỉnh Phú Thọ', '25', 'tỉnh', 'tinh_phu_tho', '210', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(17, 'Tỉnh Vĩnh Phúc', '26', 'tỉnh', 'tinh_vinh_phuc', '211', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(18, 'Tỉnh Bắc Ninh', '27', 'tỉnh', 'tinh_bac_ninh', '222', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(19, 'Tỉnh Hải Dương', '30', 'tỉnh', 'tinh_hai_duong', '220', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(20, 'Thành phố Hải Phòng', '31', 'thành phố trung ương', 'thanh_pho_hai_phong', '225', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(21, 'Tỉnh Hưng Yên', '33', 'tỉnh', 'tinh_hung_yen', '221', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(22, 'Tỉnh Thái Bình', '34', 'tỉnh', 'tinh_thai_binh', '227', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(23, 'Tỉnh Hà Nam', '35', 'tỉnh', 'tinh_ha_nam', '226', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(24, 'Tỉnh Nam Định', '36', 'tỉnh', 'tinh_nam_dinh', '228', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(25, 'Tỉnh Ninh Bình', '37', 'tỉnh', 'tinh_ninh_binh', '229', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(26, 'Tỉnh Thanh Hóa', '38', 'tỉnh', 'tinh_thanh_hoa', '237', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(27, 'Tỉnh Nghệ An', '40', 'tỉnh', 'tinh_nghe_an', '238', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(28, 'Tỉnh Hà Tĩnh', '42', 'tỉnh', 'tinh_ha_tinh', '239', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(29, 'Tỉnh Quảng Bình', '44', 'tỉnh', 'tinh_quang_binh', '232', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(30, 'Tỉnh Quảng Trị', '45', 'tỉnh', 'tinh_quang_tri', '233', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(31, 'Tỉnh Thừa Thiên Huế', '46', 'tỉnh', 'tinh_thua_thien_hue', '234', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(32, 'Thành phố Đà Nẵng', '48', 'thành phố trung ương', 'thanh_pho_da_nang', '236', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(33, 'Tỉnh Quảng Nam', '49', 'tỉnh', 'tinh_quang_nam', '235', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(34, 'Tỉnh Quảng Ngãi', '51', 'tỉnh', 'tinh_quang_ngai', '255', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(35, 'Tỉnh Bình Định', '52', 'tỉnh', 'tinh_binh_dinh', '256', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(36, 'Tỉnh Phú Yên', '54', 'tỉnh', 'tinh_phu_yen', '257', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(37, 'Tỉnh Khánh Hòa', '56', 'tỉnh', 'tinh_khanh_hoa', '258', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(38, 'Tỉnh Ninh Thuận', '58', 'tỉnh', 'tinh_ninh_thuan', '259', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(39, 'Tỉnh Bình Thuận', '60', 'tỉnh', 'tinh_binh_thuan', '252', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(40, 'Tỉnh Kon Tum', '62', 'tỉnh', 'tinh_kon_tum', '260', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(41, 'Tỉnh Gia Lai', '64', 'tỉnh', 'tinh_gia_lai', '269', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(42, 'Tỉnh Đắk Lắk', '66', 'tỉnh', 'tinh_dak_lak', '262', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(43, 'Tỉnh Đắk Nông', '67', 'tỉnh', 'tinh_dak_nong', '261', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(44, 'Tỉnh Lâm Đồng', '68', 'tỉnh', 'tinh_lam_dong', '263', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(45, 'Tỉnh Bình Phước', '70', 'tỉnh', 'tinh_binh_phuoc', '271', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(46, 'Tỉnh Tây Ninh', '72', 'tỉnh', 'tinh_tay_ninh', '276', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(47, 'Tỉnh Bình Dương', '74', 'tỉnh', 'tinh_binh_duong', '274', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(48, 'Tỉnh Đồng Nai', '75', 'tỉnh', 'tinh_dong_nai', '251', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(49, 'Tỉnh Bà Rịa - Vũng Tàu', '77', 'tỉnh', 'tinh_ba_ria_vung_tau', '254', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(50, 'Thành phố Hồ Chí Minh', '79', 'thành phố trung ương', 'thanh_pho_ho_chi_minh', '28', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(51, 'Tỉnh Long An', '80', 'tỉnh', 'tinh_long_an', '272', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(52, 'Tỉnh Tiền Giang', '82', 'tỉnh', 'tinh_tien_giang', '273', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(53, 'Tỉnh Bến Tre', '83', 'tỉnh', 'tinh_ben_tre', '275', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(54, 'Tỉnh Trà Vinh', '84', 'tỉnh', 'tinh_tra_vinh', '294', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(55, 'Tỉnh Vĩnh Long', '86', 'tỉnh', 'tinh_vinh_long', '270', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(56, 'Tỉnh Đồng Tháp', '87', 'tỉnh', 'tinh_dong_thap', '277', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(57, 'Tỉnh An Giang', '89', 'tỉnh', 'tinh_an_giang', '296', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(58, 'Tỉnh Kiên Giang', '91', 'tỉnh', 'tinh_kien_giang', '297', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(59, 'Thành phố Cần Thơ', '92', 'thành phố trung ương', 'thanh_pho_can_tho', '292', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(60, 'Tỉnh Hậu Giang', '93', 'tỉnh', 'tinh_hau_giang', '293', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(61, 'Tỉnh Sóc Trăng', '94', 'tỉnh', 'tinh_soc_trang', '299', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(62, 'Tỉnh Bạc Liêu', '95', 'tỉnh', 'tinh_bac_lieu', '291', '2021-11-11 01:38:39', '2021-11-11 01:38:39'),
	(63, 'Tỉnh Cà Mau', '96', 'tỉnh', 'tinh_ca_mau', '290', '2021-11-11 01:38:39', '2021-11-11 01:38:39');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;

-- Dumping structure for table job.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.migrations: ~14 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(184, '2021_10_31_113644_create_company_user_recruiment_table', 1),
	(240, '2014_10_12_000000_create_users_table', 2),
	(241, '2014_10_12_100000_create_password_resets_table', 2),
	(242, '2019_08_19_000000_create_failed_jobs_table', 2),
	(243, '2021_06_12_080603_create_categories_table', 2),
	(244, '2021_06_12_080855_create_posts_table', 2),
	(245, '2021_06_16_083752_create_locations_table', 2),
	(246, '2021_09_21_034657_create_companies_table', 2),
	(247, '2021_09_21_071511_create_skills_table', 2),
	(248, '2021_09_21_071908_create_blogs_table', 2),
	(249, '2021_09_21_072417_create_welfares_table', 2),
	(250, '2021_10_12_212314_create_user_skill_table', 2),
	(251, '2021_10_30_020911_create_cv_submit_table', 2),
	(252, '2021_10_31_112632_create_company_user_favorite_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table job.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table job.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desPost` longtext COLLATE utf8mb4_unicode_ci,
  `reqPost` longtext COLLATE utf8mb4_unicode_ci,
  `typeTimePost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `titlePost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rankPost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tech_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id_post`, `desPost`, `reqPost`, `typeTimePost`, `deadline`, `wage`, `quantity`, `titlePost`, `rankPost`, `tech_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, '<h2 style="margin-bottom: 0px; font-size: 14px; overflow-wrap: break-word; font-family: " roboto,helvetica,verdana,arial",="" sans-serif;="" color:="" rgb(57,="" 62,="" 70);"=""><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px;"><span style="font-weight: 700;">Mô tả công việc:</span></p></h2><div style="overflow-wrap: break-word; font-size: 14px; font-family: " roboto,helvetica,verdana,arial",="" sans-serif;="" color:="" rgb(57,="" 62,="" 70);"=""><ul style="padding-left: 2rem;"><li style="text-align: justify;">Build and manage the Database for our Applications anything</li><li style="text-align: justify;">Create APIs to handle requests between App and Database</li><li style="text-align: justify;">Document the APIs</li><li style="text-align: justify;">Research and develop backend solutions</li><li style="text-align: justify;">Support our developers</li><li style="text-align: justify;">Collaborate with other team members to get tasks done</li><li style="text-align: justify;">Staying up to date with new technology trends and protocols</li></ul></div>', '<h2 style="margin-bottom: 0px; font-size: 14px; overflow-wrap: break-word; font-family: " roboto,helvetica,verdana,arial",="" sans-serif;="" color:="" rgb(57,="" 62,="" 70);"=""><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; line-height: 26px;"><span style="font-weight: 700;">Yêu cầu công việc:</span></p></h2><div style="overflow-wrap: break-word; font-size: 14px; font-family: " roboto,helvetica,verdana,arial",="" sans-serif;="" color:="" rgb(57,="" 62,="" 70);"=""><ul style="padding-left: 2rem;"><li style="text-align: justify;">A bachelor degree in Information Technology pilogy</li><li style="text-align: justify;">At least 2 years experience in developing and operating backend systems</li><li style="text-align: justify;">Proficiency in PHP, Java, Node.js</li><li style="text-align: justify;">Experience with AWS services</li><li style="text-align: justify;">Ability to optimize systems</li><li style="text-align: justify;">Excellent independent working and teamworking</li><li style="text-align: justify;">Willing to learn new things like serverless technology</li><li style="text-align: justify;">Agile/Scrum experience is a plus</li><li style="text-align: justify;">Being pro-active, responsible, and diligent</li><li style="text-align: justify;">Previous exposure to large-scale systems design is a huge plus</li><li style="text-align: justify;">Preferably to be able to communicate in English</li><li style="text-align: justify;">Be able to work offline in Hanoi</li></ul></div>', '["4"]', '11/11/2021', 'Thỏa thuận', 5, 'Tuyển dụng lập trình viên php', '["1"]', '["4","5"]', 2, NULL, '2021-11-11 02:05:29', '2021-11-11 06:39:26'),
	(2, '<ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Phát triển các website, service &amp; các hệ hống hỗ trợ vận hành cho sản phẩm game.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Xây dựng và phát triển hệ thống tool nội bộ.</span></li></ul>', '<ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Hiểu biết về HTML/ CSS/ Javascript (có thể cắt giao diện website từ photoshop là một lợi thế).</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Có tư duy lập trình tốt. Thành thạo PHP, MySQL hoặc MongoDB, lập trình hướng đối tượng.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Có kiến thức, ý thức về bảo mật web.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Công việc thực tế sẽ được sắp xếp tùy theo khả năng.</span></li></ul>', '["4"]', '25/11/2021', '5000000', 10, 'Tuyển dụng lập trình viên React Js và Php Laravel', '["1","4"]', '["1","4"]', 2, NULL, '2021-10-07 06:42:47', '2021-11-11 06:42:47'),
	(3, '<p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70);"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Key responsibilities and accountabilities include (but not limited to):</span></p><ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Understanding of requirements</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Technical survey of new functions (PoC)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Application design</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Implementation of application and implementation of UT</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Code review</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Document creation</span></li></ul><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70);"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">You carry out these tasks in close communication with PMs and Technical Leads.</span></p>', '<ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of development experience using any of Python/ Java/ ReactJS</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of experience in developing by participating in a project of 5 or more people</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of experience in Web system development</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Over 3 years of experience with Linux OS and shell commands</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">3 years or more of development experience using the cloud (AWS is preferable)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of development experience using database (MSSQL, PostgreSQL, MongoDB, ElasticSearch, etc.)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Communication skills (verbal, written)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Documentation skills (design document creation)</span></li></ul>', '["4"]', '03/12/2021', '7000000', 5, 'Tuyển dụng IT support', '["5"]', '["1","3"]', 2, NULL, '2021-09-01 06:45:05', '2021-11-11 06:45:05'),
	(4, '<p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70);"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Key responsibilities and accountabilities include (but not limited to):</span></p><ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Understanding of requirements</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Technical survey of new functions (PoC)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Application design</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Implementation of application and implementation of UT</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Code review</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Document creation</span></li></ul><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70);"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">You carry out these tasks in close communication with PMs and Technical Leads.</span></p>', '<ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of development experience using any of Python/ Java/ ReactJS</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of experience in developing by participating in a project of 5 or more people</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of experience in Web system development</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Over 3 years of experience with Linux OS and shell commands</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">3 years or more of development experience using the cloud (AWS is preferable)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of development experience using database (MSSQL, PostgreSQL, MongoDB, ElasticSearch, etc.)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Communication skills (verbal, written)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Documentation skills (design document creation)</span></li></ul>', '["4"]', '26/11/2021', 'Thỏa thuận', 5, 'Tuyển dụng nhân viên it trông xe biết code', '["1","5"]', '["1","4"]', 3, NULL, '2021-08-04 06:58:28', '2021-11-11 06:58:28'),
	(5, '<p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70);"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;"><span style="font-weight: 700;">Opportunity</span></span></p><ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">This is an amazing opportunity for an up-and-coming Automation Tester to join a leading Australian Project Management Software company based in Melbourne. You will be working with a talented team that has a broad wealth of knowledge and experience in building large-scale, complex software systems.&nbsp;</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">The product provides a full end-to-end management system, with rich features, to a large number of global customers. Being a customer-focused company we are constantly evolving the system to suit the needs of our customers via an Agile and Lean methodology – and our product roadmap is growing fast!</span></li></ul><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70);"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;"><span style="font-weight: 700;">In this role</span></span></p><ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">As an Automation Tester, you will:</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Create, edit, and update automated test scripts.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Develop automation strategy and frameworks across our web, API and mobile applications.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Deliver and lead test execution activities.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Promote test early practices and enable teams to deliver faster through automation</span></li></ul>', '<ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Strong Computer Science (CS) fundamentals with Bachelor’s Degree in CS (or similar technical field of study) or equivalent practical experience.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Good English skills are a plus.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Minimum 1 years development experience in Javascript.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Node.js and Selenium/ Cypress/ Puppeteer/ Jest test automation experience.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Ensure reporting for tests with relevant metrics</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Experience with source control (e.g. Git).</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">API automated testing experience.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Experience in CI/CD with tools such as Jenkins/ Gitlab-CI.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Exposure to Cloud environments is desirable.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Good willingness to learn new technologies required for work.</span></li></ul>', '["4"]', '26/11/2021', 'Thỏa thuận', 5, 'Tuyển dụng Tester', '["2"]', '["5","6"]', 3, NULL, '2022-02-09 07:02:43', '2021-11-11 07:02:43'),
	(6, '<ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Develop an ecommerce website.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Participate in the process of technology research, analysis, and project development with Australian clients.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Warranty, maintenance to fix product bugs.</span></li></ul>', '<ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Vietnamese only.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Communicate effectively in English with clients.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">At least 2 years of commercial experience in web development with VueJS/ReactJS.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Experience in NodeJS is a plus.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Good working experience in using JavaScript, HTML5, CSS.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Proficient understanding of code version control tools, such as Git, SVN.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Debugging and optimizing code for system performance.</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Experience in using NuxtJS, Typescript, TailwindCSS, GraphQL, AWS AppSync, AWS Amplify, EsLint is a plus.</span></li></ul>', '["4"]', '01/12/2021', 'Thỏa thuận', 5, 'Tuyển dụng lập trình viên Python', '["1","4"]', '["1","4"]', 4, NULL, '2021-08-04 07:53:36', '2021-11-11 07:53:36'),
	(7, '<p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70);"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">Key responsibilities and accountabilities include (but not limited to):</span></p><ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Understanding of requirements</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Technical survey of new functions (PoC)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Application design</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Implementation of application and implementation of UT</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Code review</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Document creation</span></li></ul><p style="margin-bottom: 0px; padding-bottom: 1em; overflow-wrap: break-word; font-size: 15px; font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; line-height: 26px; color: rgb(57, 62, 70);"><span style="overflow-wrap: break-word; font-family: Roboto, Helvetica, Verdana, Arial, sans-serif;">You carry out these tasks in close communication with PMs and Technical Leads.</span></p>', '<ul style="padding-left: 2rem; color: rgb(57, 62, 70); font-family: &quot;Roboto,Helvetica,Verdana,Arial&quot;, sans-serif; font-size: 14px;"><li><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of development experience using any of Python/ Java/ ReactJS</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of experience in developing by participating in a project of 5 or more people</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of experience in Web system development</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Over 3 years of experience with Linux OS and shell commands</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">3 years or more of development experience using the cloud (AWS is preferable)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">More than 3 years of development experience using database (MSSQL, PostgreSQL, MongoDB, ElasticSearch, etc.)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Communication skills (verbal, written)</span></li><li style="text-align: justify;"><span style="font-family: Roboto, Helvetica, Verdana, Arial, sans-serif; font-size: 15px;">Documentation skills (design document creation)</span></li></ul>', '["4"]', '09/12/2021', 'Thỏa thuận', 20, 'Tuyển dụng nhân viên it biết sửa máy in,pha cà phê , sai vặt', '["5"]', '["1","5"]', 4, NULL, '2021-11-11 07:55:33', '2021-11-11 07:55:33');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table job.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameSkill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.skills: ~0 rows (approximately)
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` (`id`, `nameSkill`, `created_at`, `updated_at`) VALUES
	(1, 'React Native', '2021-11-11 01:56:53', '2021-11-11 01:56:53'),
	(2, 'React JS', '2021-11-11 01:57:04', '2021-11-11 01:57:04'),
	(3, 'C++/C#', '2021-11-11 01:57:10', '2021-11-11 01:57:10'),
	(4, 'Laravel', '2021-11-11 01:57:16', '2021-11-11 01:57:16'),
	(5, 'Php', '2021-11-11 01:57:24', '2021-11-11 01:57:24'),
	(6, 'HTML/CSS', '2021-11-11 01:57:41', '2021-11-11 01:57:41');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

-- Dumping structure for table job.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desiredMoney` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tiền mong muốn',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rankUser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Cấp bậc của nhân viên hiện nay :Nhân viên,giám đốc',
  `descripYourself` text COLLATE utf8mb4_unicode_ci COMMENT 'Mô tả bản thân',
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'frontend developer hay backend',
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeTimeUser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thời gian làm fulltime hay ko',
  `user_level` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Phân quyền người dùng: 0 : Admin,1:HR,2:ứng viên ',
  `company_id` int(11) DEFAULT NULL COMMENT 'Thuộc về công ty nào',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fullName`, `email`, `birthDay`, `password`, `gender`, `address`, `phone`, `desiredMoney`, `avatar`, `exp`, `rankUser`, `descripYourself`, `position`, `cv`, `typeTimeUser`, `user_level`, `company_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'toro.freetime@gmail.com', NULL, '$2y$10$3spfiWMfJYHgbHpo9Y7VM.AL8NeXOSyN04ZIPf.JpGD0Ll3h9aMWS', NULL, NULL, '032154687', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
	(2, 'Nguyễn Văn A', 'tuyendung1@gmail.com', NULL, '$2y$10$2nWGEXTTxbPopBnkDNT2iO7zSMrU2dGjlO5Azi8zNG7ujYFVo7PqG', NULL, 'Ngõ 32 ngách 107 Tân triều thanh trì hà nội', '02541265412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-10-01 02:00:27', '2021-11-11 02:00:27'),
	(3, 'Nguyễn Văn B', 'tuyendung12@gmail.com', NULL, '$2y$10$vnyzrdqB.mFBkIfFNAFjaOXZLYXJI3DQprkTA32/UvIYrU1YKga7.', NULL, 'Hoang hoa thám', '02541265412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2021-11-11 06:48:43', '2021-11-11 06:48:43'),
	(4, 'Nguyễn Văn C', 'tuyendung34@gmail.com', NULL, '$2y$10$FuT1ZyW7CFMu1/lMQyyfyuOp//IxIF4VNG9b0WJPXwmsfIOsRS20G', NULL, 'quảng tây', '02541265412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, NULL, '2021-11-11 07:28:13', '2021-11-11 07:28:13'),
	(5, 'Nguyễn Văn Tèo', 'ungvien@gmail.com', '10/11/2021', '$2y$10$wGxe/LlMDe1uCNjd6R6YqOJOSJk75sugPvxO3XZp0WeILqQX4lY.i', 1, 'trần nhật duật', '02541265412', '8000000', '1636798387.jpg', '13', '4', 'vui vẻ hòa đồng', 'Backend Laravel Developer', '1636798387.pdf', '4', 2, NULL, NULL, '2021-11-13 10:10:56', '2021-11-13 10:13:07'),
	(6, 'Nguyễn thị ánh', 'ungvien12@gmail.com', '05/11/2021', '$2y$10$J1B1vBGguMc7TNyP5W0Jb.L3TTPLDxWbCX7VyBhPJsLuRZ2PpUf42', 1, 'lê lợi trần khát chân hải phòng', '0395875544', '20000000', '1636798541.jpg', '2', '2', '<p>vui vẻ hòa đồng</p>', 'Frontend Laravel Developer', '1636798541.pdf', '4', 2, NULL, NULL, '2021-11-13 10:14:14', '2021-11-13 10:15:41'),
	(7, 'dev tung', 'ungvien34@gmail.com', '16/11/2021', '$2y$10$/lkcegpgTVuH0b8/LSKrrOv7PZ59UK3LYo.6eGney/IZM8t9lYRia', 1, 'ko có', '0395875544', '8000000', '1636800251.jpg', '15', '1', '<p>ko co</p>', 'ko có chức danh', '1636800251.pdf', '4', 2, NULL, NULL, '2021-11-13 10:43:14', '2021-11-13 10:44:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table job.user_skill
CREATE TABLE IF NOT EXISTS `user_skill` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.user_skill: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_skill` DISABLE KEYS */;
INSERT INTO `user_skill` (`id`, `user_id`, `skill_id`, `created_at`, `updated_at`) VALUES
	(1, 5, 1, NULL, NULL),
	(2, 5, 3, NULL, NULL),
	(3, 6, 2, NULL, NULL),
	(4, 6, 4, NULL, NULL),
	(5, 7, 4, NULL, NULL);
/*!40000 ALTER TABLE `user_skill` ENABLE KEYS */;

-- Dumping structure for table job.welfares
CREATE TABLE IF NOT EXISTS `welfares` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_welfare` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_welfare` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table job.welfares: ~0 rows (approximately)
/*!40000 ALTER TABLE `welfares` DISABLE KEYS */;
INSERT INTO `welfares` (`id`, `name_welfare`, `icon_welfare`, `created_at`, `updated_at`) VALUES
	(2, 'Miễn phí xe đưa đón', 'fas fa-bus', '2021-11-11 01:49:00', '2021-11-11 01:49:00'),
	(3, 'Traning', 'fa fa-graduation-cap', '2021-11-11 01:49:23', '2021-11-11 01:55:42'),
	(4, 'Tăng lương', 'fas fa-globe-europe', '2021-11-11 01:56:31', '2021-11-11 01:56:31');
/*!40000 ALTER TABLE `welfares` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
