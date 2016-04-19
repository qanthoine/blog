/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : site

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-04-19 18:30:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_compte` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `prevalidation` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '22c98a8b449221de2bc34599aeab097aa754d65d', '1');

-- ----------------------------
-- Table structure for `billets`
-- ----------------------------
DROP TABLE IF EXISTS `billets`;
CREATE TABLE `billets` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of billets
-- ----------------------------
INSERT INTO `billets` VALUES ('1', 'Bonjour', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:19:44');
INSERT INTO `billets` VALUES ('2', 'Ensuite ..', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:19:59');
INSERT INTO `billets` VALUES ('3', 'On continu ..', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:20:11');
INSERT INTO `billets` VALUES ('4', 'Une pause ..', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:20:23');
INSERT INTO `billets` VALUES ('5', 'On reprend', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:20:33');
INSERT INTO `billets` VALUES ('6', 'Sinon ..', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:20:47');
INSERT INTO `billets` VALUES ('7', 'Premium', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:21:01');
INSERT INTO `billets` VALUES ('8', 'Class ..', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:21:09');
INSERT INTO `billets` VALUES ('9', 'Visio', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:21:16');
INSERT INTO `billets` VALUES ('10', 'Parcours', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:21:29');
INSERT INTO `billets` VALUES ('11', 'Reportage', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a dolor vel libero tempor tristique vitae vitae ex. Mauris vel viverra justo, nec condimentum lacus. Etiam ut mattis velit. Sed sagittis blandit orci, bibendum elementum diam sollicitudin vitae. Vestibulum pharetra diam pharetra finibus accumsan. Integer velit risus, scelerisque non sagittis vitae, finibus a quam. Duis quis libero venenatis, malesuada risus eget, euismod est. Cras dignissim, purus nec consequat placerat, sapien risus dictum quam, nec lobortis nunc nisl quis ligula. Maecenas feugiat dignissim vestibulum. Cras scelerisque, urna non semper congue, risus justo rutrum elit, ut vulputate nisi orci vel justo.\r\n\r\nDuis pharetra congue libero vitae feugiat. Sed in lacus diam. Donec lobortis enim nec orci vulputate tristique. Aenean rhoncus sodales laoreet. Quisque justo arcu, pulvinar eu sagittis id, posuere et risus. Proin ac eros vel nibh sodales sodales. Nunc pulvinar non turpis sed blandit. Sed sit amet nibh vel justo elementum dignissim in in nisl. Donec varius, leo eu mollis molestie, eros elit tristique justo, et commodo neque tellus scelerisque ante. In velit leo, maximus a pretium ut, ullamcorper vel arcu. Aenean nec orci aliquet, gravida dolor ac, congue nunc. Nunc rutrum ipsum dignissim tincidunt pellentesque. Morbi condimentum ligula sed massa ultricies, ac euismod ipsum pulvinar.\r\n\r\nVivamus ut elit scelerisque, laoreet nulla sed, convallis odio. Curabitur gravida dictum orci eu pellentesque. In dictum, nulla non auctor sollicitudin, felis lacus hendrerit lacus, eget maximus eros sapien at metus. Proin quam sem, elementum eget lectus ut, commodo lacinia neque. Etiam nec elit a enim porta volutpat a sed enim. Vivamus pharetra vehicula efficitur. Suspendisse rhoncus ante nec velit molestie tincidunt. Nulla placerat euismod mauris, eu interdum urna interdum vel. Morbi luctus diam lectus, at efficitur mauris semper condimentum. Quisque justo enim, vulputate vitae nibh sit amet, lacinia varius nisl.', '2016-04-06 14:21:39');

-- ----------------------------
-- Table structure for `commentaires`
-- ----------------------------
DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'Anonyme',
  `message` text CHARACTER SET utf8 NOT NULL,
  `date_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news` int(11) NOT NULL,
  `email_atr` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of commentaires
-- ----------------------------
INSERT INTO `commentaires` VALUES ('1', 'Anonyme', 'Bonjour c\'est pas Quentin\r\n', '2016-04-11 14:52:03', '11', '', '1');
INSERT INTO `commentaires` VALUES ('2', 'Quentin', 'Bonjour c\'est Quentin', '2016-04-11 23:32:14', '11', 'qanthoine@gmail.com', '1');
