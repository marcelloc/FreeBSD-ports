# Created by: Tim Hemel
# $FreeBSD$

PORTNAME=	picviz
PORTVERSION=	0.4
PORTREVISION=	5
CATEGORIES=	graphics security
MASTER_SITES=	http://www.wallinfire.net/picviz/attachment/wiki/ReleasesDownload/
DISTFILES=	${PORTNAME}-${PORTVERSION}${EXTRACT_SUFX}?format=raw

MAINTAINER=	ports@timit.nl
COMMENT=	Parallel coordinates plotter

BROKEN=		Unfetchable
DEPRECATED=	Broken for more than 6 months
EXPIRATION_DATE=	2015-10-31

LIB_DEPENDS=	libpcre.so:${PORTSDIR}/devel/pcre \
		libcairo.so:${PORTSDIR}/graphics/cairo

USE_LDCONFIG=	yes
USES=		bison cmake pkgconfig

.include <bsd.port.mk>
