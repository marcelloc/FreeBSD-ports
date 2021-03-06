# Created by: Francisco Cabrita <include@npf.pt.freebsd.org>
# $FreeBSD$

PORTNAME=	joomla
PORTVERSION=	3.4.5
CATEGORIES=	www
PKGNAMESUFFIX=	3

MAINTAINER=	nivit@FreeBSD.org
COMMENT=	Dynamic web content management system (CMS)

LICENSE=	GPLv2

GH_PROJECT=	${PORTNAME}-cms

NO_ARCH=	yes
NO_BUILD=	yes

PLIST_SUB=	WWWOWN=${WWWOWN} WWWGRP=${WWWGRP}

USES=		shebangfix
SHEBANG_FILES=	build/indexmaker.php \
		libraries/vendor/leafo/lessphp/lessify

SUB_FILES=	pkg-message

USE_GITHUB=	yes
USE_MYSQL=	yes
USE_PHP=	gd json mbstring mysql mysqli pcre pdf session simplexml xml zip zlib

WANT_PHP_WEB=	yes
WWWDIR=		${PREFIX}/www/${PORTNAME}${PORTVERSION:R:R}

do-install:
	@${MKDIR} ${STAGEDIR}${WWWDIR}
	@(cd ${WRKSRC} && \
		${FIND} . -type d -exec ${MKDIR} ${STAGEDIR}${WWWDIR}/{} \;)
	@(cd ${WRKSRC} && \
		${FIND} . \! -type d -and \! \( -name .gitignore -or -name .travis.yml \
			-or -name travisci-phpunit.xml -or -name LICENSE.txt \
			-or -name README.md \) \
			-exec ${INSTALL_DATA} {} ${STAGEDIR}${WWWDIR}/{} \;)

.include <bsd.port.mk>
