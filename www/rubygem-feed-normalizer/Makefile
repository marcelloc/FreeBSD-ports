# Created by: TERAMOTO Masahiro <markun@onohara.to>
# $FreeBSD$

PORTNAME=	feed-normalizer
PORTVERSION=	1.5.2
CATEGORIES=	www textproc rubygems
MASTER_SITES=	RG

MAINTAINER=	markun@onohara.to
COMMENT=	Extensible wrapper for Atom and RSS parsers

LICENSE=	BSD3CLAUSE
LICENSE_FILE=	${WRKSRC}/License.txt

RUN_DEPENDS=	rubygem-simple-rss>=1.1:${PORTSDIR}/www/rubygem-simple-rss \
		rubygem-hpricot>=0.6:${PORTSDIR}/www/rubygem-hpricot \
		rubygem-hoe>=1.5.0:${PORTSDIR}/devel/rubygem-hoe

NO_ARCH=	yes

USE_RUBY=	yes
USE_RUBYGEMS=	yes
RUBYGEM_AUTOPLIST=	yes

.include <bsd.port.mk>
